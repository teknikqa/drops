+++
date = "2008-03-29T19:43:00+03:00"
draft = true
title = "Proxy Firefox through SSH"

+++

Requirements:

1.  [PuTTY] on local machine
2.  Remote host running [OpenSSH]

**1. Create a new PuTTY session**

Run PuTTY and create a new session in PuTTY to connect to the remote host that is running OpenSSH. Fill in the hostname, the port (usually 22), make sure SSH is checked, give it a session name and hit Save.

**2. Configure a secure tunnel**

Click on “Tunnels” on the left and set up dynamic fowarding for a local port (e.g. 7070). Under “Add new forwarded port” type in 7070 for the source port, leave the destination blank, and check Auto and Dynamic. Then it the Add button. If you did it correctly, you’ll see D7070 listed in the Forwarded Ports box.

That’s it for tunnels, as there is no need to create more than one. Remember to save your session profile in PuTTY so you don’t have to set up the tunnel next time.

**3. Connect to the remote SSH box**

Double click on the connection profile and type in your username and password when prompted.

**4. Configure Firefox**

Go to Tools, Options, General, and then click on Connection Settings.

Check Manual Proxy Configuration, leave most of the fields blank, but fill in 127.0.0.1 for the SOCKS v5 host with a port of 7070 (or whatever you used in Step 2).

**5. Enjoy**

That’s it. From now on, as long as you first log into the remote ssh host with PuTTY, your Firefox and IM traffic will be routed over a secure tunnel to the remote host and then out to the Net. Good stuff.

Note:

-   Use [Pidgin] with these settings for your IM needs.
-   Use [Thunderbird] with these settings for email.
-   If you’re using linux, skip the first three steps and run `ssh -D 7070 username@host.com`

###### Adapted from - [Proxy Firefox through a SSH tunnel]

  [PuTTY]: http://www.chiark.greenend.org.uk/~sgtatham/putty/
  [OpenSSH]: http://www.openssh.com/
  [Pidgin]: http://www.pidgin.im/
  [Thunderbird]: http://www.mozilla.com/thunderbird/
  [Proxy Firefox through a SSH tunnel]: http://calomel.org/firefox_ssh_proxy.html "Proxy Firefox through a SSH tunnel"
