+++
date = "2011-03-27T17:03:08+03:00"
draft = true
title = "One Bad Apple Spoils the Bunch"

+++

This is interesting: *[One Bad Apple Spoils the Bunch: Exploiting P2P Applications to Trace and Profile Tor Users]*

Assume that a source wants to leak top secret documents anonymously. It is considered secure to do so through Tor using a privacy-enhancing browser plugin such as TorButton. However, assume that, at the same time, this source uses another insecure application on Tor. Is it then possible to associate the top secret documents with the IP address of the anonymous source? The answer to this question is yes!

> **Abstract:** Tor is a popular low-latency anonymity network. However, Tor does not protect against the exploitation of an insecure application to reveal the IP address of, or trace, a TCP stream. In addition, because of the linkability of Tor streams sent together over a single circuit, tracing one stream sent over a circuit traces them all. Surprisingly, it is unknown whether this linkability allows in practice to trace a significant number of streams originating from secure (i.e., proxied) applications.
>
> In this paper, we show that linkability allows us to trace 193% of additional streams, including 27% of HTTP streams possibly originating from “secure” browsers. In particular, we traced 9% of all Tor streams carried by our instrumented exit nodes. Using BitTorrent as the insecure application, we design two attacks tracing BitTorrent users on Tor. We run these attacks in the wild for 23 days and reveal 10,000 IP addresses of Tor users. Using these IP addresses, we then profile not only the BitTorrent downloads but also the websites visited per country of origin of Tor users. We show that BitTorrent users on Tor are over-represented in some countries as compared to BitTorrent users outside of Tor. By analyzing the type of content downloaded, we then explain the observed behaviors by the higher concentration of pornographic content downloaded at the scale of a country. Finally, we present results suggesting the existence of an underground BitTorrent ecosystem on Tor.

  [One Bad Apple Spoils the Bunch: Exploiting P2P Applications to Trace and Profile Tor Users]: http://hal.inria.fr/inria-00574178/en/
