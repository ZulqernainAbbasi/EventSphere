FROM php:8.2-cli

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy EventSphere
COPY . /app

# Use the application directory
WORKDIR /app

# Railway provides PORT
ENV PORT=8080

# Start PHP built-in web server
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} -t /app"]