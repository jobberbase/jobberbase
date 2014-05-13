
if [ -z $1 ]
then
VHOST_INCLUDE_FILE=/tmp/jobberbase_vhost.inc
else
VHOST_INCLUDE_FILE=$1
fi

echo "Virtual Hosts can be set by name or by Port, in Port based virtualhosts multiple services are Identified by the Port they reside on. To Connect you need to use a URL of the form www.yoursite.com:<port number>"
echo "Name based Virtualhosts listen on the same port, Usually 80, The Browser passed the hostname used to connect to the site to the server and separates the sites based on that. Name based Virtualhosts require a DNS entry be setup for each virtualhost"

echo

echo "Use a name based Virtualhost [Y/N]"
read -n 1 VHOST_TYPE
echo
if [ "$VHOST_TYPE" = 'n' -o "$VHOST_TYPE" = 'N' ]
then
VHOST_HOSTNAME=\*;
else
echo "Fully Qualified hostname of your service (eg myjobberbase.com)"
read VHOST_HOSTNAME
echo
fi


echo "Port Number [80]"

echo "For both named hosts or Port based virtual hosts you can specify a Port, Normally web services are on port 80"
read _PORT
echo
if [  -z "$_PORT"  ]
then
VHOST_PORT=80
else
VHOST_PORT=$_PORT
fi

echo "What is the actual IP Address of this Server (if Multiple interfaces) leave blank for listening on the server default interfaces"
read  IP_ACTUAL
echo
if [ -z "$IP_ACTUAL" ]
then
IP_ACTUAL="SERVER_DEFAULT"
fi
# echo "Some servers live behind a gateway, The web browser on the internet will attach to the IP address of your Nat device (router) What is your public address on the internet for this server?";
#read IP_WAN
#echo
echo "What is the full path to the Jobberbase installation?"
read VHOST_DOCUMENTROOT

echo Verify:
echo Internal IP \[$IP_ACTUAL\]
#echo External IP \[$IP_WAN\]
echo Port \[$VHOST_PORT\]
echo Named Host?\[$VHOST_TYPE\]
if [ "$VHOST_HOSTNAME" != \* ]
then
echo Domain Name \[$VHOST_HOSTNAME\]
fi
echo "DocumentRoot" \[$VHOST_DOCUMENTROOT\]
echo "Is this information correct"
read -n 1 INF_CORRECT
echo


if [ "$INF_CORRECT" = 'Y' -o "$INF_CORRECT" = "y" ]
then
  

   if [  "$VHOST_PORT" = "80" -a  "$IP_ACTUAL" = "SERVER_DEFAULT"  ]
   then
      echo > $VHOST_INCLUDE_FILE
   else
      if [ "$IP_ACTUAL" = "SERVER_DEFAULT" ]
      then
         echo "Listen" $VHOST_PORT >$VHOST_INCLUDE_FILE
      else
         echo "Listen" $IP_ACTUAL\:$VHOST_PORT >$VHOST_INCLUDE_FILE
      fi
   fi
   
   echo \<VirtualHost "$VHOST_HOSTNAME"':'"$VHOST_PORT"\> >>$VHOST_INCLUDE_FILE
   echo "DocumentRoot \"$VHOST_DOCUMENTROOT\"" >>$VHOST_INCLUDE_FILE
   echo >>$VHOST_INCLUDE_FILE

   echo '<Directory "'$VHOST_DOCUMENTROOT'" >' >>$VHOST_INCLUDE_FILE
   echo '    Options FollowSymLinks'>>$VHOST_INCLUDE_FILE
   echo '    AllowOverride All'>>$VHOST_INCLUDE_FILE
   echo '    Order allow,deny'>>$VHOST_INCLUDE_FILE
   echo '    Allow from all'>>$VHOST_INCLUDE_FILE
   echo   '</Directory>'>>$VHOST_INCLUDE_FILE
   echo '</VirtualHost>'>>$VHOST_INCLUDE_FILE
   echo >>$VHOST_INCLUDE_FILE



   echo "Cut and paste the following into your server config, or a file has been created at $VHOST_INCLUDE_FILE"
   echo "===================================================="
   cat $VHOST_INCLUDE_FILE
else
   echo "Aborting"
fi


