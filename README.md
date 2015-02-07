#hs-silesia-template

Due to probable changes, I've added a huge buildtool just to make templating easier. 

Instructions:
* get node.js in version 0.10 or higher. It may be IO.js, but it probably won't work well at the moment (20.01.2015)
* Type `npm install` to install all required modules
* Start gulp compile-watch by typing `npm start`
* Here you go, the site will be compiled in `deploy` directory!
* When you commit, the git-hook should automatically compile all your assets before creating your commit.

To look at the site, please setup any webserver (for example python's SimpleHTTPServer) on the whole directory and enter localhost:PORT/deploy dir. 