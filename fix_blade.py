#!/usr/bin/env python3
import re

# Read the original HTML file
with open(r'c:\Users\Black Coder\Downloads\Backend\bvoxf\resources\views\index.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace CSS and JS files
replacements = [
    # CSS
    (r'href="./Bvox_files/style\.css"', r"href=\"{{ asset('css/style.css') }}\""),
    
    # JS files - remove .download extension
    (r'src="./Bvox_files/jquery\.js\.download"', r"src=\"{{ asset('js/jquery.js') }}\""),
    (r'src="./Bvox_files/config\.js\.download"', r"src=\"{{ asset('js/config.js') }}\""),
    (r'src="./Bvox_files/pako\.min\.js\.download"', r"src=\"{{ asset('js/pako.min.js') }}\""),
    (r'src="./Bvox_files/js\.cookie\.min\.js\.download"', r"src=\"{{ asset('js/js.cookie.min.js') }}\""),
    (r'src="./Bvox_files/web3\.min\.js\.download"', r"src=\"{{ asset('js/web3.min.js') }}\""),
    (r'src="./Bvox_files/web3model\.min\.js\.download"', r"src=\"{{ asset('js/web3model.min.js') }}\""),
    (r'src="./Bvox_files/web3provider\.js\.download"', r"src=\"{{ asset('js/web3provider.js') }}\""),
    (r'src="./Bvox_files/fp\.min\.js\.download"', r"src=\"{{ asset('js/fp.min.js') }}\""),
    
    # Favicon
    (r'href="./Bvox_files/favicon\.ico"', r"href=\"{{ asset('favicon.ico') }}\""),
    (r'src="./Bvox_files/favicon\.ico"', r"src=\"{{ asset('img/favicon.ico') }}\""),
    
    # Images - all PNG files
    (r'src="./Bvox_files/([^"]+\.png)"', r"src=\"{{ asset('img/\1') }}\""),
]

for pattern, replacement in replacements:
    content = re.sub(pattern, replacement, content)

# Replace HTML links with route() helpers
link_replacements = [
    (r'href="notify\.html"', r'href="{{ route(\'notify\') }}"'),
    (r'href="service\.html"', r'href="{{ route(\'service\') }}"'),
    (r'href="mining\.html"', r'href="{{ route(\'mining\') }}"'),
    (r'href="contract\.html\?market=btc"', r'href="{{ route(\'contract\') }}?market=btc'),
    (r'href="contract\.html\?market=eth"', r'href="{{ route(\'contract\') }}?market=eth'),
    (r'href="contract\.html\?market=doge"', r'href="{{ route(\'contract\') }}?market=doge'),
    (r'href="contract\.html\?market=bch"', r'href="{{ route(\'contract\') }}?market=bch'),
    (r'href="contract\.html\?market=ltc"', r'href="{{ route(\'contract\') }}?market=ltc'),
    (r'href="contract\.html\?market=xrp"', r'href="{{ route(\'contract\') }}?market=xrp'),
    (r'href="contract\.html\?market=trx"', r'href="{{ route(\'contract\') }}?market=trx'),
    (r'href="contract\.html\?market=sol"', r'href="{{ route(\'contract\') }}?market=sol'),
    (r'href="contract\.html\?market=ada"', r'href="{{ route(\'contract\') }}?market=ada'),
    (r'href="contract\.html\?market=bsv"', r'href="{{ route(\'contract\') }}?market=bsv'),
    (r'href="contract\.html\?market=link"', r'href="{{ route(\'contract\') }}?market=link'),
    (r'href="ai-arbitrage\.html"', r'href="{{ route(\'ai-arbitrage\') }}"'),
    (r'href="loan\.html"', r'href="{{ route(\'loan\') }}"'),
    (r'href="assets\.html"', r'href="{{ route(\'assets\') }}"'),
    (r'href="identity\.html"', r'href="{{ route(\'identity\') }}"'),
    (r'href="financial\.html"', r'href="{{ route(\'financial\') }}"'),
    (r'href="telegram\.html"', r'href="{{ route(\'telegram\') }}"'),
    (r'href="license\.html"', r'href="{{ route(\'license\') }}"'),
    (r'href="faqs\.html"', r'href="{{ route(\'faqs\') }}"'),
    (r'href="lang\.html"', r'href="{{ route(\'lang\') }}"'),
]

for pattern, replacement in link_replacements:
    content = re.sub(pattern, replacement, content)

# Write the corrected file
with open(r'c:\Users\Black Coder\Downloads\Backend\bvoxf\resources\views\index.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)

print("✓ Blade file successfully updated with all asset() and route() helpers")
