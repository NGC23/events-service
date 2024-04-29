# Event Service

Micro Service/Rest Api to handle event related requests

## Installation - local development
 
 For local development be sure that the mysql container is running and you have run the following to create a netowrk to bridge the containers, this will soon be updated into a Make file for ease of local development.

 ```bash
 docker network create \
  --driver=bridge \
  --attachable \
   jeeves
   ```

After you are sure this is running, which can also be confirmed with a 

```bash
docker ps
docker network ls
```

After confirming all is running you can simply run the following to start the service, you will confirm this by seeing the `mysql` container and the network `jeeves` after running above commands.

```bash
docker compose up
```

You can add a `-d` flag to silence the output in the terminal but otherwise that is all that is required, then you sould be able to run the `docker ps` command from above and you should see the `event-service` container running.

## Upcoming Developments
- Make file to automate the above. (IN NEW BRANCH)
- Implement Kubernetes for containers. (IN NEW BRANCH)
- API Key (Security update)
