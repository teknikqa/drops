#!/bin/bash

if [ $# -ne 1 ]
  then
  printf "Incorrect usage. Please pass a file containing the list of files to append text. \n"
  printf "Usage: ./append-lines-to-file <filename> \n"
  exit 1
else
  printf "These are the files in the directory: \n"
  cat $1
  read -r -p "Are you sure you want append text to these files? [y/N] " response
  if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
  then
    for filename in $(cat $1) ;
    do
      printf "Appending text to $filename \n"
      # Remove spaces when creating the file
      cat <<EOT >> $filename.md
+++
date = ""
draft = true
title = ""

+++
EOT
    done
    printf "\n"
    printf "Done! \n"
  else
    printf "Not modifying any files. \n"
  fi
fi
