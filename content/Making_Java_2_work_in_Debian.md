+++
date = "2008-03-23T19:26:00+03:00"
draft = true
title = "Making Java 2 work in Debian"

+++

Download the j2se SDK from [the Sun download site]. Download the “.bin” file. In a terminal window, run the following commands.

-   Switch to root use by issuing
    `$ su -`
    `Password: `
-   cd to the directory where the file was downloaded.
    `# cd ~nick/Downloads/`
-   Change the permission of the file and execute it.
    `# chmod +x j2sdk*.bin # ./j2sdk-*.bin`
-   Make a directory under `/usr/local` (for example `/usr/local/sun`).
    `# mkdir /usr/local/sun`
-   Copy the extracted java directory to this newly created directory.
    `# mv j2sdk* /usr/local/sun`
-   Adjust the configurations to ensure that java works correctly. (This is because Debian/Linux uses different versions of java, that may not be reset when the Sun Java is installed.
    `# update-alternatives --install /usr/bin/javac javac /usr/local/sun/j2sdk*/bin/javac 120         # update-alternatives --install /usr/bin/java java /usr/local/sun/j2sdk*/bin/java 120`

You should now have a working jdk environment, virtual machine and compiler.

You might need to change your `/etc/profile` adding the proper definitions of some environment variables (CLASSPATH, JAVA\_COMPILER and JAVA\_HOME) so that Java programs can find the kit you just have installed. Append the following lines to your `/etc/profile`. The following example show which settings you could add if you had installed Sun’s 1.4.2 jdk:

`JAVA_COMPILER=/usr/local/sun/j2sdk1.4.2_17/lib:/usr/local/sun/j2sdk1.4.2_17/jre/libexport     export JAVA_COMPILER`

`JAVA_HOME=/usr/local/sun/j2sdk1.4.2_17/     export JAVA_HOME`

`PATH=$PATH:/usr/local/sun/j2sdk1.4.2_17/bin`
`export PATH`

This should enable it for all users, except root. If you want to compile and run java programs as root, add the above lines to `/root/.bash_profile.`

Note: This has been tested only in Debian, although it should work in other distro’s too.

  [the Sun download site]: http://java.sun.com
