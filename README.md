# Intro a Kubernetes

## Concepts

- **Kubernetes:** container orchestrator
- **Cluster:** group of machines running kubernetes
- **Deployment**
	- **Pod** Unit of execution, normally with one container, dynamic address
	- **Service:** Unit of access, connect to Pods
	- **Ingress:** Unit of access from outside world, *name* driven
- **`kubectl`:** command line tool to configure kubernetes
- **`helm`:** command line tool to deploy workloads
- **Chart:** helm work unit

### Manage images

- Upload container images to local hub, https://hub.srv.unc.edu.ar

### Workload

```     
+--------+       +---------+       +---------+   name                 
| Pod(s) | <---> | service | <---> | ingress | <------> { world } 
+--------+       +---------+       +---------+
```

## Using Kubernetes (GUI)

- **url** https://rancher2-dev.srv.unc.edu.ar/
- **user** admin
- **pass** Lyq756


