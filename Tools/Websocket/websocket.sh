#!/bin/bash
#TsholoVPN
clear
echo "INSTALLING WEBSOCKET OPENVPN PYTHON"
sleep 1
echo Setup By TsholoVPN...
sleep 0.5
cd

# System OpenVPN Websocket Python
wget -O /etc/systemd/system/ws.service https://www.dropbox.com/s/q8wff1x4az0092e/ws.service &> /dev/null

# Install Script Websocket-SSH Python
wget -O /usr/local/bin/ws-openvpn https://www.dropbox.com/s/32qp1l8wb4zr9vb/ws-dropbear &> /dev/null

# Set Permission
chmod +x /usr/local/bin/ws-dropbear

# Enable And Start Service
systemctl daemon-reload
systemctl enable ws.service
systemctl start ws.service
systemctl restart ws.service

clear
cd
echo " "
echo " "
echo "WEBSOCKET SUCCESSFULLY INSTALLED!"
echo "SCRIPT BY TSHOLOVPN"
rm -f /root/websocket.sh