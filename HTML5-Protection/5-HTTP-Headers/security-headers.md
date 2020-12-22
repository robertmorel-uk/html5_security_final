# HTTP Strict Transport Security (HSTS)
------------------------------------------
## Use only secure HTTPS connections, never via the insecure HTTP protocol
------------------------------------------
Strict-Transport-Security: max-age=31536000; includeSubDomains

# X-Frame-Options
------------------------------------------
## Allow the display of the application in an IFrame
------------------------------------------
X-Frame-Options: deny | sameorigin | allow-from: DOMAIN

# X-Content-Type-Options 
------------------------------------------
## Prevent the browser from interpreting files as a different MIME type to what is specified in the Content-Type HTTP header
------------------------------------------
X-Content-Type-Options: nosniff

# Content-Security-Policy
------------------------------------------
## Security policy that prevents a wide range of attacks, including cross-site scripting and other cross-site injections  by defining content sources which are approved.
------------------------------------------
See ./content-security-policy.md

# Referrer-Policy
------------------------------------------
## Send Referer header information with requests.
------------------------------------------
Referrer-Policy: no-referrer | no-referrer-when-downgrade | origin | origin-when-cross-origin | same-origin | strict-origin | strict-origin-when-cross-origin | unsafe-url

# Feature-Policy
------------------------------------------
## Enable and disable use of various browser APIs
------------------------------------------
Feature-Policy: camera * | 'self' | 'src' | 'origin' | 'none'

# Expect-CT
------------------------------------------
## Evaluate connections to the host for Certificate Transparency compliance.
------------------------------------------
Expect-CT: max-age=86400, enforce

# X-XSS-Protection
------------------------------------------
## Enables the cross-site scripting (XSS) filter in your browser (set to 0 as depreceated)
------------------------------------------
X-XSS-Protection: 0
