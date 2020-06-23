# Install ROS on windows 10 using WSL *(without VM)*

Here I'll explain step-by-step how to install ROS on Windows 10 using [Windows Subsystem for Linux (WSL)](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F).

> **Note:**  You can Go to a full guide from [Wiki](https://github.com/MohanadSinan/Smart-Methods/wiki/Install-ROS-on-windows-10-using-WSL-(Full-guide)).



| Contents                                                     |
| :----------------------------------------------------------- |
| [<u>Step1:</u> Install the Windows Subsystem for Linux (WSL).](#step1-install-the-windows-subsystem-for-linux-wsl) |
| [<u>Step2:</u> Install Ubuntu distribution.](#step2-install-ubuntu-distribution) |
| [<u>Step3:</u> Install ROS distribution.](#step3-install-ros-distribution) |
| [<u>Step4:</u> Test your installation.](#step4-test-your-installation) |




# <u>Step1:</u> Install the Windows Subsystem for Linux (WSL).

## 1. Enabling WSL in Windows 10

Before installing any Linux distributions on Windows, you must enable the "Windows Subsystem for Linux" optional feature:

1. Open [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```





## 2. Update to WSL 2 `(Optional)`

[WSL 2](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-2) is a new version of the architecture in WSL that changes how Linux distributions interact with Windows.



> **Note:** WSL 2 is only available in Windows 10, updated to version 2004, **Build 19041** or higher.



### 2.1	Enable the 'Virtual Machine Platform' optional component:

Before installing [WSL 2](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-2), you must enable the "Virtual Machine Platform" optional feature.

1. Open [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
```

2. **Restart** your computer when prompted



### 2.2	Updating the WSL 2 Linux kernel:

To manually update the Linux kernel inside of [WSL 2](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-2) please **download and install** the [Linux kernel update package](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi) for x64 machines.

> **Note:** If you're using an ARM64 machine, please download the [ARM64 package](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_arm64.msi) instead.



### 2.3	Set WSL 2 as your default version:

Once you have the kernel installed, please run the following command in [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) to set [WSL 2](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-2) as the default version when installing a new Linux distribution:

```powershell
wsl --set-default-version 2
```





# <u>Step2:</u> Install Ubuntu distribution.

## 1. Installing Ubuntu on WSL

### 1.1	Installing Ubuntu on WSL via the Microsoft Store:

1. Open the Microsoft Store and select Ubuntu distribution:

   ![View of Linux distributions in the Microsoft Store](https://docs.microsoft.com/en-us/windows/wsl/media/store.png)

2. From the [Ubuntu](https://www.microsoft.com/en-us/p/ubuntu/9nblggh4msv6) distribution's page, select "Get".

   ![Linux distributions in the Microsoft store](https://docs.microsoft.com/en-us/windows/wsl/media/ubuntustore.png)





## 2. Set up a new Ubuntu distribution on WSL

### 2.1	Starting Ubuntu on WSL:

The Ubuntu on WSL terminal can be started via the app tile in the Windows Start menu (or pinned to your taskbar)

### 2.2	Create a user account and password:

The first time you launch a newly installed Linux distribution, a console window will open and you'll be asked to wait for a minute or two for files to de-compress and be stored on your PC. All future launches should take less than a second.

Once you have [installed Ubuntu on WSL](#1-installing-ubuntu-on-wsl), the first step you will be asked to complete when opening your newly installed Linux distribution is to create an account, including a **User Name** and **Password**.

- This **User Name** and **Password** is specific to your Linux distribution and has no bearing on your Windows user name.
- Once you create this **User Name** and **Password**, the account will be your default user for the distribution and automatically sign-in on launch.
- This account will be considered the Linux administrator, with the ability to run `sudo` (Super User Do) administrative commands.
- Each Linux distribution running on the Windows Subsystem for Linux has its own Linux user accounts and passwords. You will have to configure a Linux user account every time you add a distribution, reinstall, or reset.

![Ubuntu unpacking in the Windows console](https://docs.microsoft.com/en-us/windows/wsl/media/ubuntuinstall.png)





### 2.3	Update and upgrade packages

Most distributions ship with an empty or minimal package catalog. We strongly recommend regularly updating your package catalog and upgrading your installed packages using your distribution's preferred package manager. For Ubuntu, use apt:

```bash
sudo apt update && sudo apt upgrade
```





# <u>Step3:</u> Install ROS distribution.

## 1. Download a ROS distribution

There is more than one ROS distribution supported at a time. You can download the latest version of ROS below:

| [ROS Noetic Ninjemys](http://wiki.ros.org/noetic/Installation) |
| :----------------------------------------------------------: |
|                    **Released May, 2020**                    |
|        ***Latest LTS*** *,supported until May, 2025*         |
|                `Recommended for Ubuntu 20.04`                |
| <img src="https://raw.githubusercontent.com/ros-infrastructure/artwork/master/distributions/noetic.png" alt="Noetic Ninjemys" height="200"/> |



## 2. Ubuntu install of ROS Noetic

### 2.1	Setup your `sources.list`:

Setup your computer to accept software from packages.ros.org.

```bash
sudo sh -c 'echo "deb http://packages.ros.org/ros/ubuntu $(lsb_release -sc) main" > /etc/apt/sources.list.d/ros-latest.list'
```

### 2.2	Set up your keys:

```bash
sudo apt-key adv --keyserver 'hkp://keyserver.ubuntu.com:80' --recv-key C1CF6E31E6BADE8868B172B4F42ED6FBAB17C654
```

> If you experience issues connecting to the keyserver, you can try substituting `hkp://pgp.mit.edu:80` or `hkp://keyserver.ubuntu.com:80` in the previous command.

Alternatively, you can use curl instead of the apt-key command, which can be helpful if you are behind a proxy server:

```bash
curl -sSL 'http://keyserver.ubuntu.com/pks/lookup?op=get&search=0xC1CF6E31E6BADE8868B172B4F42ED6FBAB17C654' | sudo apt-key add -
```



### 2.3	Installation:

First, make sure your Debian package index is up-to-date:

```bash
sudo apt update
```



**ROS Desktop-Full Install:**  Everything in **Desktop** plus 2D/3D simulators and 2D/3D perception packages

```bash
sudo apt install ros-noetic-desktop-full
```



### 2.4	Environment setup

You must source this script in every **bash** terminal you use ROS in.

```bash
source /opt/ros/noetic/setup.bash
```

It can be convenient to automatically source this script every time a new shell is launched. These commands will do that for you.

**Bash**

> **Note:** If you have more than one ROS distribution installed, `~/.bashrc` must only source the `setup.bash` for the version you are currently using.

```bash
echo "source /opt/ros/noetic/setup.bash" >> ~/.bashrc
source ~/.bashrc
```



# <u>Step4:</u> Test your installation.

Now, to test your installation, A good way to check is to ensure that [environment variables](http://wiki.ros.org/ROS/EnvironmentVariables) like [ROS_ROOT](http://wiki.ros.org/ROS/EnvironmentVariables#ROS_ROOT) and [ROS_PACKAGE_PATH](http://wiki.ros.org/ROS/EnvironmentVariables#ROS_PACKAGE_PATH) are set:

```bash
printenv | grep ROS
```

If they are not then you might need to 'source' some setup.
