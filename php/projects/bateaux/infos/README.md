1.MAil DEV:
a: installer NodeJS
b: installer Mail DEV : npm install -g maildev@1.0.0-rc2
c: modifier php.ini :
                    ; For Win32 only.
                    ; http://php.net/smtp
                    SMTP = 127.0.0.1
                    SMTP = localhost
                    ; http://php.net/smtp-port
                    smtp_port = 1025
d: lancer maildev : maildev
e: port localhost : 1080

2 : modifier le path php via : https://www.forevolve.com/en/articles/2016/10/27/how-to-add-your-php-runtime-directory-to-your-windows-10-path-environment-variable/

3. reCAPCHAT

Obtenir la clé sur google captcha
Librairie PHP : https://github.com/google/recaptcha
Enlever la ligne : >$recptcha -> setExpectedHostname('recaptcha-demo.appspot.com') et faire directement : $recptcha -> verify($gRecaptchaResponse);



4.VS CODE
EXTENSIONS :
- Auto Close Tag
- Auto Rename Tag
- Beautify
- Dark-Dracula theme
- DotENV
- Dracula Official
- PHP IntelliSense : 
    path:{
    "php.validate.executablePath": "C:\\wamp64\\bin\\php\\php7.0.4\\php.exe",
    "php.executablePath": "C:\\wamp64\\bin\\php\\php7.0.4\\php.exe"
}


