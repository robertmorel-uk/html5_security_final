# Testing url 
https://securityheaders.com/
https://csp-evaluator.withgoogle.com/

# Starter policy
default-src 'none' https://www.example.com:443 *.example.com; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'

# Real world policy
default-src 'self' api.example.com wss://api.example.com/v2/websocket www.google-analytics.com tagmanager.google.com ssl.google-analytics.com www.googletagmanager.com; object-src 'none'; frame-src www.google.com www.youtube.com trading.example.com; script-src 'self' 'unsafe-inline' www.google.com/recaptcha/api.js www.gstatic.com/recaptcha/ api.example.com tagmanager.google.com ssl.google-analytics.com www.google-analytics.com www.googletagmanager.com cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js ajax.cloudflare.com static.cloudflareinsights.com; img-src * 'self' data: www.google-analytics.com; style-src 'self' 'unsafe-inline' tagmanager.google.com fonts.googleapis.com; base-uri 'self'; form-action 'self'; font-src 'self' fonts.gstatic.com data:

****Attributes****
# All
*
# None
'none'
# Port
https://www.example.com:443
# Subdomain
*.example.com
# HTTPS only
https:
# Host domain only
'self' 
# Specific URL
https://www.example.com
# Base64 images
data:
# Inline attributes, style attribute, onclick, script, javascript:
'unsafe-inline'
# Dynamic code evaluation
'unsafe-eval'

# NGINX example implementation
add_header Content-Security-Policy: "default-src 'none'; script-src https://www.example.com";

# APACHE example implementation
Header set Content-Security-Policy "default-src 'none'; script-src https://www.example.com;"

default-src 
# Default fallback
script-src 
# Scripts,
object-src 
# Plugins,
style-src 
# Stylesheets (CSS),
img-src 
# Images,
media-src 
# Video and audio,
frame-src 
# Frames,
frame-ancestors 
# IFrame or Object Parents.
font-src 
# Fonts,
connect-src 
# Define which URIs the protected resource can load using script interfaces.
child-src
# Web workers and browsing contexts loaded in IFrames.
form-action 
# Form action,
worker-src
# Web workers
navigate-to
# Restricts links that may be navigated to
------------------------------------------------------
sandbox 
# IFrame sandbox
sandbox allow-forms allow-scripts;
**
allow-forms allow-same-origin allow-scripts allow-popups, allow-modals, allow-orientation-lock, allow-pointer-lock, allow-presentation, allow-popups-to-escape-sandbox, and allow-top-navigation
script-nonce 
**
------------------------------------------------------
# Define script execution by requiring the presence of the specified nonce on script elements,
plugin-types 
# Define the set of plugins that can be invoked by the protected resource by limiting the types of resources that can be embedded,
reflected-xss 
# Instructs a user agent to activate or deactivate any heuristics used to filter or block reflected cross-site scripting attacks, equivalent to the effects of the non-standard X-XSS-Protection header,
report-uri 
# Post reports to a specified URL.