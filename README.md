# Intro a Kubernetes

## Concepts

- **Kubernetes:** container orchestrator
- **Cluster:** group of machines running kubernetes
- **Namespace:** Logical grouping of deployments
- **Deployment**
	- **Pod** Unit of execution, normally with one container, dynamic address
	- **Service:** Unit of access, connect to Pods
	- **Ingress:** Unit of access from outside world, *name* driven
- **`kubectl`:** command line tool to configure kubernetes
- **`helm`:** command line tool to deploy workloads
- **Chart:** helm work unit

### Manage images

- Upload container images to local hub, https://hub.srv.unc.edu.ar

### Deployment

```     
   *-app          *-service         *-ingress
+--------+       +---------+       +---------+   name                 
| Pod(s) | <---> | service | <---> | ingress | <------> { world } 
+--------+       +---------+       +---------+
```

## Using Kubernetes (GUI)

- **url** https://rancher2-dev.srv.unc.edu.ar/
- **user** admin
- **pass** admin

## Using Kubernetes (CLI)

- Install **`kubectl`** 
  `$ sudo snap install kubectl --classic`

- Install **`helm`** 
  `$ sudo snap install helm --classic`

- Download and install cluster config 
	- Go to GUI, Global -> cluster (name) 
	- Click on  'Kubeconfig file'
	- Copy to clipboard
	- Edit `~/.kube/config`
	- Paste and save

- Verify tools
	- ```
		$ kubectl version
		Client Version: version.Info{Major:"1", Minor:"15", GitVersion:"v1.15.1", GitCommit:"4485c6f18cee9a5d3c3b4e523bd27972b1b53892", GitTreeState:"clean", BuildDate:"2019-07-24T18:15:39Z", GoVersion:"go1.12.7", Compiler:"gc", Platform:"linux/amd64"}
		Server Version: version.Info{Major:"1", Minor:"13", GitVersion:"v1.13.5", GitCommit:"2166946f41b36dea2c4626f90a77706f426cdea2", GitTreeState:"clean", BuildDate:"2019-03-25T15:19:22Z", GoVersion:"go1.11.5", Compiler:"gc", Platform:"linux/amd64"}
	  ```

	- ```
		$ helm version
		Client: &version.Version{SemVer:"v2.14.2", GitCommit:"a8b13cc5ab6a7dbef0a58f5061bcc7c0c61598e7", GitTreeState:"clean"}
		Server: &version.Version{SemVer:"v2.14.0", GitCommit:"05811b84a3f93603dd6c2fcfe57944dfa7ab7fd0", GitTreeState:"clean"}
	  ```


## Build and push example images
- Node example from https://nodejs.org/de/docs/guides/nodejs-docker-webapp/
- Apache example using environment variables
- 	```
	$ cd images
	$ ../build-push.sh node-test node/
	$ ../build-push.sh apache-test apache/
	```
- Two images available (for user bgkriegel)
	- hub.srv.unc.edu.ar/bgkriegel/node-test
	- hub.srv.unc.edu.ar/bgkriegel/apache-test

## App deployment using `helm`
- `helm` use *charts* (https://helm.sh/docs/developing_charts/)
- Basic structure
	```
	project/
	     Charts.yaml
	     values.yaml
	     templates/
	               deployment.yaml
	               service.yaml
	               ingress.yaml
	```
- Usage
	```
	$ helm install project/ -n project-name
	```
	(*`project-name`* fancy name for deployment, if absent docker-like name)

### Helm commands
- ***install*** `$ helm install project/ -n project-name`
- ***remove*** `$ helm delete --purge project-name`
- ***upgrade** `$ helm upgrade --recreate-pods project-name project/`
- ***check*** `$ helm lint project/`
- ***list*** `$ helm list`
- ***debug*** `$ helm install --debug --dry-run project/`

### Node example
- Install
	```
	$ cd k8s/
	$ helm list
	$ helm install node/ -n node-test
	...
	$ helm list
	```
	Wait a few seconds until ingress starts (check in GUI)
	Add external access using https://redirector.dev.unc.edu.ar

- Delete
	```
	$ cd k8s/
	$ helm list
	$ helm delete --purge node-test
	```

### Apache example 
- This example use environment varibles defined in secrets and configmaps
- Take a look at *apache-test-configmap.yaml* and *apache-test-secrets.yaml*
- Configmap
	- Install (**NOTE** specify namespace)
	```
	$ kubectl apply -f apache-test-configmap.yaml --namespace intro
	```
	- Upgrade
	```
	$ kubectl replace -f apache-test-secrets.yaml --namespace intro
	```
	- Delete
	```
	$ kubectl delete -f apache-test-secrets.yaml --namespace intro
	```
- Secret
  - Same command as configmap

- Install workload
	```
	$ cd k8s/
	$ helm list
	$ helm install apache/ -n apache-test
	...
	$ helm list
	```
	Wait a few seconds until ingress starts (check in GUI)
	Add external access using https://redirector.dev.unc.edu.ar
