+++
date = "2008-03-14T18:33:00+03:00"
draft = true
title = "Shortcut to 'Safely Remove Hardware'"

+++

Press Windows Key + R (To open the run dialog).

Type in the following:

`C:\Users\UserName\AppData\Roaming\Microsoft\Internet Explorer\Quick Launch` ` `

Now create a shortcut (right-click on an empty space in the folder and select New-&gt; shortcut). Add the following line.

`RunDll32.exe shell32.dll,Control_RunDLL hotplug.dll`

This creates a quick launch to the “Safely Remove Hardware” dialog. Now you can reduce the number of clicks to remove a USB drive.

###### Source : [Create a Shortcut or Hotkey for the Safely Remove Hardware Dialog]

  [Create a Shortcut or Hotkey for the Safely Remove Hardware Dialog]: http://www.howtogeek.com/howto/windows-vista/create-a-shortcut-or-hotkey-for-the-safely-remove-hardware-dialog/ "Create a Shortcut or Hotkey for the Safely Remove Hardware Dialog"
