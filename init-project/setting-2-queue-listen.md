To run `php artisan queue:listen redis --queue="T5CloudService"` with Supervisor on CentOS or Ubuntu, using Nginx or Apache as your web server, follow these steps:

### **1. Create a Supervisor Configuration for Laravel Queue Worker**

You need to create a Supervisor configuration file to manage the Laravel queue worker process.

#### **For Ubuntu**

1. **Install Supervisor** (if not already installed):
   ```bash
   sudo apt-get update
   sudo apt-get install supervisor
   ```

2. **Create Supervisor Configuration File**:
   Create a configuration file for your queue worker. For example:
   ```bash
   sudo nano /etc/supervisor/conf.d/laravel-queue-worker-abarobotic-face.conf
   ```

3. **Add the Configuration**:
   Add the following content to the file:

   ```ini
   [program:laravel-queue-worker-abarobotic-face]
   command=php /path/to/your/laravel/project/artisan queue:listen redis --queue="T5CloudService"
   process_name=%(program_name)s_%(process_num)02d
   numprocs=1
   autostart=true
   autorestart=true
   user=your_user
   stdout_logfile=/var/log/supervisor/laravel-queue-worker-abarobotic-face.log
   stderr_logfile=/var/log/supervisor/laravel-queue-worker-abarobotic-face.err.log
   ```

   Replace `/path/to/your/laravel/project` with the actual path to your Laravel project and `your_user` with the appropriate username.

4. **Update Supervisor**:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start laravel-queue-worker-abarobotic-face
   ```

#### **For CentOS**

1. **Install Supervisor** (if not already installed):
   ```bash
   sudo yum install epel-release
   sudo yum install supervisor
   ```

2. **Create Supervisor Configuration File**:
   Create a configuration file:
   ```bash
   sudo nano /etc/supervisord.d/laravel-queue-worker-abarobotic-face.ini
   ```

3. **Add the Configuration**:
   Add the following content to the file:

   ```ini
   [program:laravel-queue-worker-abarobotic-face]
   command=php /path/to/your/laravel/project/artisan queue:listen redis --queue="T5CloudService"
   process_name=%(program_name)s_%(process_num)02d
   numprocs=1
   autostart=true
   autorestart=true
   user=your_user
   stdout_logfile=/var/log/supervisor/laravel-queue-worker-abarobotic-face.log
   stderr_logfile=/var/log/supervisor/laravel-queue-worker-abarobotic-face.err.log
   ```

   Replace `/path/to/your/laravel/project` with the path to your Laravel project and `your_user` with the appropriate username.

4. **Update Supervisor**:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start laravel-queue-worker-abarobotic-face
   ```

### **2. Ensure Proper Permissions**

Ensure the user specified in the Supervisor configuration has the necessary permissions to read and write to the log files and to access the Laravel project directory.

### **3. Verify Operation**

Check the logs to verify that the queue worker is running properly:

```bash
tail -f /var/log/supervisor/laravel-queue-worker-abarobotic-face.log
tail -f /var/log/supervisor/laravel-queue-worker-abarobotic-face.err.log
```

### **4. Web Server Configuration**

The Supervisor configuration does not directly interact with Nginx or Apache. However, ensure that your web server is properly configured to serve your Laravel application. For example, Nginx should be set up to serve your Laravel application and handle requests properly.

#### **For Nginx**:
Ensure Nginx is configured to serve your Laravel application correctly. There’s no need for additional Nginx configuration for Supervisor-managed processes.

#### **For Apache**:
Ensure Apache is configured correctly to serve your Laravel application. Similarly, no additional Apache configuration is needed for Supervisor-managed processes.

By following these steps, you should be able to manage your Laravel queue worker with Supervisor on either Ubuntu or CentOS.