.PHONY: populate-db
populate-db:
	@cat data.sql | docker-compose exec -T db psql -U api-platform -d api
