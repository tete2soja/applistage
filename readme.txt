APPLISTAGE

Quand le projet est déplacé sur un ftp, il faut faire les choses suivantes après le transfert :

- chmod 777 sur fuel/app/logs public/assets/doc fuel/packages/pdf/lib/tcpdf/cache
- url_rewrite et fileinfo doivent être activés dans la configuration du serveur web
