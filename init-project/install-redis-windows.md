To install Redis on Windows, follow these steps:

### Method 1: Using Redis for Windows (Microsoft Archive)

1. **Download Redis for Windows:**
   - Go to the [Microsoft archive](https://github.com/microsoftarchive/redis/releases) and download the latest `.msi` installer.

2. **Run the Installer:**
   - Double-click the downloaded `.msi` file to run the installer.
   - Follow the prompts to install Redis. The default settings should be fine for most users.

3. **Start Redis:**
   - After installation, Redis should start automatically. You can verify this by opening a command prompt and typing `redis-cli`. You should see the Redis command-line interface.

4. **Configure Redis:**
   - You can configure Redis by editing the `redis.windows.conf` file located in the Redis installation directory (usually `C:\Program Files\Redis`).

### Method 2: Using WSL (Windows Subsystem for Linux)

If you prefer to use a Linux environment on Windows, you can use WSL:

1. **Install WSL:**
   - Follow the [Microsoft documentation](https://docs.microsoft.com/en-us/windows/wsl/install) to install WSL and a Linux distribution of your choice (e.g., Ubuntu).

2. **Install Redis in WSL:**
   - Open your WSL terminal and run the following commands:
     ```bash
     sudo apt update
     sudo apt install redis-server
     ```

3. **Start Redis:**
   - You can start Redis with:
     ```bash
     sudo service redis-server start
     ```

4. **Verify Installation:**
   - Use `redis-cli` to interact with Redis:
     ```bash
     redis-cli
     ```

Either method will get Redis running on your Windows machine. If you're working on a production setup or require advanced features, the WSL method might be preferable.

## ISSUE
```ini
'redis-cli' is not recognized as an internal or external command, operable program or batch file.
```

It sounds like the Redis CLI is not in your system's PATH. Here’s how to address this issue depending on your installation method:

### For Redis for Windows (Microsoft Archive)

1. **Verify Installation Directory:**
   - Check if Redis was installed in the default directory (`C:\Program Files\Redis`) or another location.

2. **Add Redis to System PATH:**
   - Go to **Control Panel** > **System and Security** > **System** > **Advanced system settings**.
   - Click on **Environment Variables**.
   - In the **System variables** section, find the `Path` variable and click **Edit**.
   - Click **New** and add the path to the Redis installation directory (e.g., `C:\Program Files\Redis`).
   - Click **OK** to save the changes.

3. **Restart Command Prompt:**
   - Close any open command prompt windows and open a new one to ensure it recognizes the updated PATH.

### For Redis Installed via WSL

1. **Ensure Redis is Running:**
   - Open your WSL terminal and make sure Redis is running:
     ```bash
     sudo service redis-server status
     ```

2. **Use Redis CLI in WSL:**
   - Within the WSL terminal, you should be able to run `redis-cli` directly:
     ```bash
     redis-cli
     ```

### Testing Redis CLI

To test if the `redis-cli` is recognized:

1. **Open Command Prompt or WSL Terminal:**
   - For the Windows installation, open Command Prompt.
   - For WSL, open your WSL terminal.

2. **Type `redis-cli`:**
   - In Command Prompt or WSL terminal, type `redis-cli` and press Enter.

If you’re still facing issues, ensure that Redis is correctly installed and the executable files are in the correct directory.