# hf_noise_master_server
This repository will have the Master Noise monitoring server code
# Project Status.
This project is opertaional but do have small bugs.
The noise graphing part is still under construction.
Here is the working url http://rfnoise.amsatsa.org.za
# Dependency 
This project is using the Daygraph graphing engin http://dygraphs.com/
Cron  0 3 * * * /home/anton/sh/create_data_for_graph_from_db.sh  > /dev/null
