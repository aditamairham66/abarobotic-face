Here's how to install Redis on both Ubuntu and CentOS.

### For Ubuntu

1. **Update Package List:**
   Open your terminal and run:
   ```bash
   sudo apt update
   ```

2. **Install Redis:**
   Install Redis using the following command:
   ```bash
   sudo apt install redis-server
   ```

3. **Start Redis:**
   Redis should start automatically. You can verify its status with:
   ```bash
   sudo systemctl status redis-server
   ```

4. **Configure Redis (Optional):**
   Edit the configuration file if needed:
   ```bash
   sudo nano /etc/redis/redis.conf
   ```

5. **Enable Redis to Start on Boot:**
   To ensure Redis starts on system boot, run:
   ```bash
   sudo systemctl enable redis-server
   ```

6. **Test Redis:**
   Open the Redis CLI to test:
   ```bash
   redis-cli
   ```
   You can then run commands like `PING` to check connectivity.

### For CentOS

1. **Install EPEL Repository:**
   Redis is available in the EPEL (Extra Packages for Enterprise Linux) repository, so you need to install it first:
   ```bash
   sudo yum install epel-release
   ```

2. **Install Redis:**
   Install Redis using:
   ```bash
   sudo yum install redis
   ```

3. **Start Redis:**
   Start the Redis service with:
   ```bash
   sudo systemctl start redis
   ```

4. **Enable Redis to Start on Boot:**
   To ensure Redis starts on system boot, run:
   ```bash
   sudo systemctl enable redis
   ```

5. **Configure Redis (Optional):**
   Edit the configuration file if needed:
   ```bash
   sudo nano /etc/redis.conf
   ```

6. **Test Redis:**
   Open the Redis CLI to test:
   ```bash
   redis-cli
   ```
   Run commands like `PING` to verify Redis is working.

By following these steps, you should have Redis up and running on either Ubuntu or CentOS.