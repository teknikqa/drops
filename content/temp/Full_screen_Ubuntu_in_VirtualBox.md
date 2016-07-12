[VirtualBox] is a great way to test different platforms without actually installing them. It creates a perfect virtual machine to play with. Of course, a dummy virtual machine is of no use, until you install on OS on it.

<img src="http://nm7.org/sites/default/files/images/08/23/2010%20-%2010%3A49/ubuntuvbox.png" title="VirtualBox under Windows" alt="VirtualBox under Windows" width="700" height="361" />

To learn more on setting up VirtualBox, check out this great post at [Lifehacker].

And if you want pre-compiled VirtualBox images, head over to [VirtualBox Images].

This post is about how to get the Guest Additions running for Ubuntu. Why would you want to run the Guest Additions? For one, it provides full-screen ability. Complete screen-size, not the teeny window size that is present by default. There are other goodies too, such as, mouse-pointer integration and improved performance.

The only drawback is the license. These additions are covered under the [PUEL license], rather than the GPLv2.

Alright, now how do you get the additions working. I’m using Ubuntu as my guest OS. But, these steps can be easily modified for other Linux OSes too.

1.  Mount your Ubuntu cd/ISO from the VirtualBox GUI.
2.  Mount the VirtualBox Guest Additions by clicking on **Device &gt; Install Guest Additions**.
3.  Once Ubuntu is up and running, open a terminal and find the kernel version by running ` uname -r`
4.  Run the following command to install pre-requisites. (Replace KERNELVERSION with the output of the above command). ` sudo apt-get install build-essential linux-headers-KERNELVERSION`
5.  Depending on your platform, run the VirtualBoxAdditions installer ` sudo sh /media/cdrom/VBoxLinuxAdditions-x86.run all (Use VBoxLinuxAdditions-x64.run for 64-bit platforms).`
6.  Restart the machine.

Note: For Fedora (or rpms based machines), run the 4th step as

`yum install kernel-headers kernel-devel gcc`

Source: [Robotification][] \[via <a href="http://ubuntuforums.org/showthread.php?t=588181" target="_self" title="[SOLVED] Vir">

  [VirtualBox]: http://www.virtualbox.org/ "VirtualBox"
  [Lifehacker]: http://lifehacker.com/5204434/the-beginners-guide-to-creating-virtual-machines-with-virtualbox "The Beginner's Guide to Creating Virtual Machines with VirtualBox"
  [VirtualBox Images]: http://virtualboximages.com/ "VirtualBox Images"
  [PUEL license]: http://www.virtualbox.org/wiki/VirtualBox_PUEL "VirtualBox_PUEL - VirtualBox"
  [Robotification]: http://www.robotification.com/component/content/article/8-programming/7-how-to-install-virtual-box-additions-on-ubuntu.html "How to install Virtual Box Additions on Ubuntu"
