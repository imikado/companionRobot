#!/bin/bash
mkdir -p /tmp/companion1/data
chmod -R 777 /tmp/companion1/data
cp Project/Shared/ExampleOne/contactList.json /tmp/companion1/data
docker compose -f composeOneInstance.yml up
