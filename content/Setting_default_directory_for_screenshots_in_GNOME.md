+++
date = "2012-11-12T15:17:46+03:00"
draft = true
title = "Setting default directory for screenshots in GNOME"

+++

There is no easy way to configure the location where screenshots get saved using `gnome-screenshot`.

In order to set this option, install `dconf-editor` package:

    yum install dconf-editor

Run `dconf-editor`, navigate to `org/gnome/gnome-screenshot`, and specify any directory in the `auto-save-directory` value where all screen shots should be saved automatically, for example, `file:///home/user/Screenshots`.

Remember to change the value of `last-save-directory` too, so that any screenshot taken by running gnome-screenshot in interactive mode will save it to this location too.

While this sets the directory where screenshots get saved, there is no option to set the name of the screenshots. This isn’t a problem by itself, but if you share the image with Windows users, it is impossible for them to open such files.

There is a simple hack to rename these screenshots immediately after their creation.

First install inotify-tools

    yum install inotify-tools

Then run this command:

    while true; do inotifywait -e CREATE ~/Screenshots && rename 's/\:/\_/' Screenshot/Screenshot*.png; done;

When this command is run, everytime you save a new screenshot in `~/Screenshot/` directory, the script will rename every file containing `:`, substituting `:` with `_`.
