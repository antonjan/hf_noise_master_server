wget --timeout=3 --tries=1 --spider --no-check-certificate http://zr6aic.giga.co.za

if [ $? -ne 0 ];then
  echo "zr6aic.giga.co.za Site Down" | mail -s "Site Down zr6aic.giga.co.za" anton.janovsky@gmail.com
fi
wget --timeout=3 --tries=1 --spider --no-check-certificate http://www.giga.co.za

if [ $? -ne 0 ];then
  echo "www.giga.co.za Site Down" | mail -s "Site Down www.giga.co.za" anton.janovsky@gmail.com 
fi
