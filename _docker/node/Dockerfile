FROM node:20

RUN apt-get update && apt-get install -y \
    vim \
    zip \
    unzip \
    curl

# Change current user
USER node

EXPOSE 5173

CMD ["sh", "-c", "npm install && npm run dev -- --host"]
