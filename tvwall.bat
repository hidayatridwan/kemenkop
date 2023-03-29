echo off
start C:\Windows\explorer.exe
cls
echo please wait... 
echo Load Data...
timeout 40
start "C:\Program Files\Google\Chrome\Application" chrome.exe --kiosk http://localhost/kemenkop/tvwall/display --autoplay-policy=no-user-gesture-required --disable-features=PreloadMediaEngagementData,AutoplayIgnoreWebAudio,MediaEngagementBypassAutoplayPolicies

exit