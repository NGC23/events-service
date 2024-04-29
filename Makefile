build-events-service-image:
	@echo "Building jeeves event service image and puhsing to registry, please be sure you are logged in to docker as we will push the image to the hub and minikube is running"
	@docker build -t events-service . -f Dockerfile
	@docker tag events-service ngc23/events-service:latest
	@docker push ngc23/events-service:latest
	@echo "Building of the jeeves services and please be sure you are logged in to docker as we will push the image to the hub, frontend application must still happen with a ionic serve"
	@echo "Docker images done building and pushed..."

push-to-docl-registry:
	@echo "tbc"

build-pod-local:
	@echo "still working on the approach"

push-to-kubernetes-prod:
	@echo "lets also check this one first...."