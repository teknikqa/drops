+++
date = "2011-03-19T03:14:33+03:00"
draft = true
title = "Yum remove Enlightenment"

+++

Here’s a one-liner that will save some time. Uses sed, uniq, sort and of course regular expressions.

    yum remove `yum search enlightenment | awk '{print $1}' | sed -e 's/.\(x86_64\|i686\|noarch\)//' -e '/^[:=]/d' -e 's/\(Loaded\|font-manager\)//' | uniq | sort`

#### What does it do?

It uses yum to remove all packages that are related to the [Enlightenment] Window Manager.
It does this by searching the package lists for the word enlightenment, prints just the first word, filters out unnecessary stuff, lists only the unique ones and finally sorts the result. This resulting list of packages is then passed on to yum to remove.

  [Enlightenment]: http://www.enlightenment.org/
