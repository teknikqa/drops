The easiest way to root an Android phone on linux is to use [Heimdall]. Heimdall is an open source program to flash Android on Samsung Galaxy devices.

Heimdall is available as a binary executable for many platforms, including Debian. Unfortunately, since I use Fedora, I had to compile the code from scratch.
First install all the needed tools.

    # Install packages such as autoconf, make, gcc necessary for compiling the code
    yum groupinstall "Development Tools"
    yum install libusb1-devel qt-devel

Then download the source code and compile it

    git clone git://github.com/Benjamin-Dobell/Heimdall.git
    cd Heimdall/libpit
    ./autogen.sh
    ./configure
    make
    cd ../heimdall
    ./autogen.sh
    ./configure
    make
    su -c 'make install'
    cd ../heimdall-frontend/
    qmake-qt4 heimdall-frontend.pro
    su -c 'make install'

You might get a message like “RCC: Warning: No resources in ‘mainwindow.qrc’” during qmake. You can safely ignore it as it is not an actual error and Heimdall will work just fine.
Now that we have installed Heimdall, we need to find out which kernel our phone is running. So on the Android phone, select `Settings -> About Phone`.

Look for  the Kernel Version. It will say something like "`3.0.15-I9100XWLP7-CL340913`". Note the text that is in bold (`LP7`). Find the kernel image that matches your phone from the [xda-developers forum] based on this string.
Once you’ve downloaded the image, we need to push it to the phone. Extract the contents of this file. Assuming you downloaded `CF-Root-SGS2_XW_XEN_LP7-v5.4-CWM5.zip`.

    unzip CF-Root-SGS2_XW_XEN_LP7-v5.4-CWM5.zip
    tar xvf CF-Root-SGS2_XW_XEN_LP7-v5.4-CWM5.tar

This should leave you with the file `zImage`.
Now, put your phone into Download mode.
Power Off
Hold `Volume Down+Home Key+Power` key until you see the intro key
Press `Volume Up` to continue (the screen will prompt you to do so)
Connect the phone to your PC with USB and check whether it’s been detected

    heimdall detect
    # Should return Device Detected
    su -c 'heimdall flash --kernel zImage'

A large amount of output will appear, which should end with

    Uploading KERNEL
    100%
    KERNEL upload successful
    Ending Session....
    Rebooting Device....
    Re-attaching kernel driver....

And your phone should reboot into the newly rooted system. Now’s a good time to look at backing up your **`efs`** folder though, to avoid needing to pay Samsung to repair things should anything go wrong.
So, install a terminal emulator on your phone, and after opening run the following

    su
    # Accept when asked if you want to grant permissions
    mkdir /sdcard/efs
    busybox tar zcvf /sdcard/efs/efs-backup.tar.gz /efs

This will create a backup of the `/efs` folder on your SDCard, so should you ever break anything in this folder you have half a chance of restoring it!

**Other guides to rooting Andoid phones:**

-   [Lifehacker’s The Always Up-To-Date Guide to Rooting the Most Popular Android Phones]
-   [CyanogenMod Wiki]
-   [XDA Developers forum]

What to do after rooting your phone? These links should help:

-   [XDA Beginners Guide: You have rooted your phone, now what can you do]
-   [StackExchange Community help]

  [Heimdall]: http://www.glassechidna.com.au/products/heimdall/
  [xda-developers forum]: http://forum.xda-developers.com/showthread.php?t=1103399
  [Lifehacker’s The Always Up-To-Date Guide to Rooting the Most Popular Android Phones]: http://lifehacker.com/5789397/the-always-up+to+date-guide-to-rooting-any-android-phone
  [CyanogenMod Wiki]: http://wiki.cyanogenmod.org/index.php
  [XDA Developers forum]: http://forum.xda-developers.com/
  [XDA Beginners Guide: You have rooted your phone, now what can you do]: http://forum.xda-developers.com/showthread.php?t=1592104
  [StackExchange Community help]: http://android.stackexchange.com/questions/1/ive-rooted-my-phone-now-what-what-do-i-gain-from-rooting
