1.  Download the [windows binaries for Ruby 1.8.7] and extract that to wherever you would like, I use c:\\ruby. Then put c:\\ruby\\bin in your PATH environment variable.
2.  Download the [zlib package] and extract the zlib1.dll, rename it to zlib.dll and move it into your Windows\\System32.
3.  Download the [iconv package]. Find and extract the iconv.dll into your Windows\\System32.
4.  Download the rubygems package and follow the instructions, basically extracting the package and running `ruby setup.rb`
5.  Verify that everything works properly by trying a ` gem install rails`
6.  once that installs then do: ` rails test_project`

Note: If zlib.dll and iconv.dll don’t work, copy them into c:\\ruby\\bin
###### Source: <http://bit.ly/DICb>

  [windows binaries for Ruby 1.8.7]: http://www.ruby-lang.org/en/downloads/
  [zlib package]: http://www.zlib.net/zlib123-dll.zip
  [iconv package]: http://sourceforge.net/project/showfiles.php?group_id=25167&package_id=51458
