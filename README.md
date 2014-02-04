wp-user-activation-key-hashing
==============================

For WordPress upgrades to 3.8.1 from older versions eg 3.6.

ALWAYS BACK UP YOUR DATABASE BEFORE USING THIS SCRIPT!!!!!

To use: add to mu-plugins folder. go to the site and set keyhashing as a GET key. EG: home.com/?keyhasing

NOTE: this can ONLY be run once!!!!! one ran, the keys are hashed and if ran again, you are rehashing hashes. Dear oh dear. 

TODO: build into a plugin and build in feature to only allow to be run once. eg do a check to see if the key is already hashed or not.
