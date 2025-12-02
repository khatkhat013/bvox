<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use kornrunner\Ethereum\Validator;
use kornrunner\Ethereum\Signer;

class Web3AuthController extends Controller
{
    /**
     * Generate a nonce for the user to sign
     */
    public function getNonce(Request $request)
    {
        $request->validate([
            'wallet_address' => 'required|string|regex:/^0x[a-fA-F0-9]{40}$/',
        ]);

        $walletAddress = strtolower($request->wallet_address);
        $nonce = 'Sign this message to login: ' . Str::random(32);

        // Store nonce in session or cache for this wallet
        cache()->put("web3_nonce_{$walletAddress}", $nonce, now()->addMinutes(15));

        return response()->json([
            'success' => true,
            'nonce' => $nonce,
            'message' => 'Please sign this nonce with your wallet',
        ]);
    }

    /**
     * Verify the signed nonce and login user
     */
    public function verify(Request $request)
    {
        $request->validate([
            'wallet_address' => 'required|string|regex:/^0x[a-fA-F0-9]{40}$/',
            'signature' => 'required|string|regex:/^0x[a-fA-F0-9]{130}$/',
        ]);

        $walletAddress = strtolower($request->wallet_address);
        $signature = $request->signature;

        // Get the nonce we issued
        $nonce = cache()->get("web3_nonce_{$walletAddress}");

        if (!$nonce) {
            return response()->json([
                'success' => false,
                'error' => 'Nonce expired or not found',
            ], 401);
        }

        try {
            // Verify the signature
            $recoveredAddress = $this->recoverAddress($nonce, $signature);

            if (strtolower($recoveredAddress) !== $walletAddress) {
                return response()->json([
                    'success' => false,
                    'error' => 'Signature verification failed',
                ], 401);
            }

            // Clear used nonce
            cache()->forget("web3_nonce_{$walletAddress}");

            // Find or create user
            $user = User::firstOrCreate(
                ['wallet_address' => $walletAddress],
                [
                    'name' => 'Web3 User ' . substr($walletAddress, 0, 10),
                    'email' => $walletAddress . '@web3.local',
                    'login_nonce' => $nonce,
                ]
            );

            // Update login nonce
            $user->update(['login_nonce' => $nonce]);

            // Create Sanctum token
            $token = $user->createToken('web3-login')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'wallet_address' => $user->wallet_address,
                    'name' => $user->name,
                ],
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Signature verification failed: ' . $e->getMessage(),
            ], 401);
        }
    }

    /**
     * Recover address from signature
     */
    private function recoverAddress($message, $signature)
    {
        // Add Ethereum prefix
        $prefix = "\x19Ethereum Signed Message:\n" . strlen($message);
        $hashData = $prefix . $message;
        $hash = hash('keccak256', $hashData, true);

        // Parse signature
        $r = substr($signature, 2, 64);
        $s = substr($signature, 66, 64);
        $v = (int)hexdec(substr($signature, 130, 2));

        // Use ecc library or ethers.js equivalent
        return $this->ecRecover($hash, $r, $s, $v);
    }

    /**
     * EC Recover implementation
     */
    private function ecRecover($hash, $r, $s, $v)
    {
        // This is a simplified version - you may need to use a library like:
        // kornrunner/ethereum-signer or web3/web3.php
        
        try {
            $signer = new Signer();
            $publicKey = $signer->recoverPublicKey(
                $hash,
                hex2bin($r),
                hex2bin($s),
                $v
            );
            
            $address = '0x' . substr(hash('keccak256', hex2bin(substr($publicKey, 2)), true), -40);
            return $address;
        } catch (\Exception $e) {
            throw new \Exception('Failed to recover address: ' . $e->getMessage());
        }
    }

    /**
     * Get current authenticated user
     */
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }
}
