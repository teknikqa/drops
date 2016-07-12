**Steps to create a password-less SSH login**

These commands are executed on linux or on a pseudo-linux environment, like cygwin. It will not work under Windows.

1.  Generate the encryption key. Do this on client machine.  `         $ ssh-keygen -t dsa -f ~/.ssh/id_dsa -C "you@client.com"` A passphrase is recommended, though not required. Enter a passphrase that you can remember. It need not be the same as your password.

2.  Skip this step if there are multiple clients connecting to the server. `         $ scp ~/.ssh/id_dsa you@server.com` Enter the password, when asked.
3.  This step is required if there are multiple clients who need to connect to the server. `         $ cat ~/.ssh/id_dsa | ssh you@server.com 'cat - >> ~/.ssh/authorized_keys'` Now if you try to connect to the server, it won’t ask for your password. If you have setup a passphrase, you are required to enter that.Do the steps below to ensure a password-less login.
4.  Edit your bash\_profile to include the following lines. This is adapted to cygwin. `         $ cat >> ~/.bash_profile SSH_ENV="$HOME/.ssh/environment" function start_agent {  echo "Initializing new SSH agent..." usr/bin/ssh-agent | sed 's/^echo/#echo/' > "${SSH_ENV}" echo succeeded chmod 600 "${SSH_ENV}" . "${SSH_ENV}" > /dev/null /usr/bin/ssh-add; } # Source SSH settings, if applicable if [ -f "${SSH_ENV}" ; then . "${SSH_ENV}" > /dev/null #ps ${SSH_AGENT_PID} doesn't work under cygwin ps -ef | grep ${SSH_AGENT_PID} | grep ssh-agent$ > /dev/null || {  start_agent;  } else start_agent;  fi`
5.  For Cygwin, use ``          $ cat >> ~/.bash_profile if [ -f ${HOME}/.ssh-agent ]; then . ${HOME}/.ssh-agent > /dev/null fi if [ -z "$SSH_AGENT_PID" -o -z "`/usr/bin/ps -a|/usr/bin/egrep \"^[ ]+$SSH_AGENT_PID\"`" ]; then /usr/bin/ssh-agent > ${HOME}/.ssh-agent . ${HOME}/.ssh-agent > /dev/null fi ``
6.  Now type in the last password of this session. `         $ssh-add ~/.ssh/id_dsa`

Ok, so we have a password-less login. This is done through the ssh-agent that hods, manages and responds to requests for private keys.

For more information, read [An Illustrated Guide to SSH Agent Forwarding]
Adapted from - [Using ssh-agent with ssh]

  [An Illustrated Guide to SSH Agent Forwarding]: http://www.unixwiz.net/techtips/ssh-agent-forwarding.html " An Illustrated Guide to SSH Agent Forwarding"
  [Using ssh-agent with ssh]: http://mah.everybody.org/docs/ssh "Using ssh-agent with ssh"
