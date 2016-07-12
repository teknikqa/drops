+++
date = "2009-07-23T20:27:00+03:00"
draft = true
title = "Use personal Bit.ly account with UrlbarExt"

+++

[UrlbarExt] is a wonderful add-on for Firefox. It provides useful tools from within the address bar of Firefox.

<img src="http://nm7.org/sites/default/files/images/08/23/2010%20-%2010%3A51/UrlBarExt.png" title="UrlBarExt" alt="UrlBarExt" width="201" height="36" />

To quote,

> UrlbarExt extends the Location Bar with set of commands to (Make Tiny URL,Copy URL,Search site,Go up,Tag pages easily ,Navigate through sequential URL’s,View page cached version,Unblock filtered websites and Surf anonymously using online phproxy servers).

This helps to shave a few key strokes from repetitive tasks. Like, copying an URL, searching a site, creating a tiny URL for a link, etc. This is one add-on that is highly recommended for power users. I use bit.ly to create tiny URL’s. bit.ly provides statistics for each short URL. This makes for great info. However, the default bit.ly URL shortener in UrlbarExt does not save this to your account. Follow these steps to use your bit.ly account with UrlbarExt.

-   Go to Tools -&gt; Add-ons.
-   Find the UrlbarExt add-on and click on options.
    <img src="http://nm7.org/sites/default/files/images/08/23/2010%20-%2011%3A18/firefox_Addons.png" title="Firefox Addons" alt="Firefox Addons" width="521" height="383" />
-   Click on the Tiny tab (the second tab from left.
    <img src="http://nm7.org/sites/default/files/images/08/23/2010%20-%2011%3A19/UrlbarExt_Options.png" title="UrlbarExt Options" alt="UrlbarExt Options" width="637" height="569" />
-   Add a new service by clicking on the + symbol. This will create a new url shortening service. Change the caption to whatever you like.
-   Enter the following into the api column.
    `http://api.bit.ly/shorten`
-   Enter the following into the Arguments column:
    `version=2.0.1&longUrl=%?url%&login=user_id&apiKey=api_key&history=1&format=xml`
    Replace **user\_id** with your username and **api\_key** with your bit.ly api key. (You can get a bit.ly api key at [http://bit.ly/account]). ***Update:** Replace these terms in the string above.*
-   Enter the following into the Filter column:
    `<shortUrl>(.+)<\/shortUrl>`
    This will filter the output and return the shortened url to the address bar.
-   Make sure to select this new service by clicking the radio button in the \# column.
-   Click OK and you’re set.

In short, this is what I’ve done. Using the 2.0.1 version of the api, I’ve given a long URL to bit.ly and asked it to shorten the URL. bit.ly will then return the result in xml format. The shortened URL is listed within the &lt;shortUrl&gt; tag. Filter the resulting xml for this tag and we get the short URL.

###### Reference: bit.ly api documentation at [ApiDocumentation - bit.ly].

  [UrlbarExt]: https://addons.mozilla.org/en-US/firefox/addon/8758
  [http://bit.ly/account]: http://bit.ly/account/ "bit.ly account settings"
  [ApiDocumentation - bit.ly]: http://bit.ly/s8BO
