# companionRobot

companion robot web interface + api

# Launch alone (to run)

```bash
mkdir -p /tmp/companion1/data
chmod -R 777 /tmp/companion1/data
docker compose -f composeOneInstance.yml up
```

Then open a browser to <http://127.0.0.1/Display/>

# Launch 2 instances (to test communication)

Will launch 2 instances: to test it works between

```bash
mkdir -p /tmp/companion1/data
mkdir -p /tmp/companion2/data
chmod -R 777 /tmp/companion1/data
chmod -R 777 /tmp/companion2data

compose -f composeTwoInstances.yml
```

Then open 2 browser to

- Companion 1: <http://127.0.0.1/Display/>
- Companion 2: <http://127.0.0.1:81/Display/>
