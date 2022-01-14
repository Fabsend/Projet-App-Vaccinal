Pour faire fonctionné l'option mail il faut télécharger sendmail : https://raw.githubusercontent.com/sendmail-tls1-2/main/master/Sendmail_v33_TLS1_2.zip

Changer dans le sendmail.ini :
smtp_server=smtp.gmail.com
smtp_port=587
auth_username=vaccina.nfs@gmail.com
auth_password=ffweczdvpxmscinj
force_sender=vaccina.nfs@gmail.com

Changer dans le php.ini :
SMTP = smtp.gmail.com
smtp_port = 587
sendmail_from = vaccina.nfs@gmail.com
sendmail_path = "lien vers sendmail.exe"


