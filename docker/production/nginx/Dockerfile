# Stage 1: Build assets with modern Node
FROM node:18-alpine AS builder

# Set working directory
WORKDIR /var/www

# Copy package.json and package-lock.json first (for caching)
COPY package*.json ./

# Install node dependencies
RUN npm install

# Copy the rest of the app
COPY . .

# Build assets (CSS + JS)
RUN npm run build

# Stage 2: Nginx production image
FROM nginx:alpine

# Copy custom Nginx configuration
COPY ./docker/production/nginx/nginx.conf /etc/nginx/nginx.conf

# Copy built assets and public folder from the builder stage
COPY --from=builder /var/www/public /var/www/public

# Set working directory to the public folder
WORKDIR /var/www/public

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
