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

### Deployment

```     
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


