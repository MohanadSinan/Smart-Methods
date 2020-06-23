# Install ROS on windows 10 using WSL *(without VM)*

Here I'll explain step-by-step how to install ROS on Windows 10 using Windows Subsystem for Linux ([WSL](https://docs.microsoft.com/en-us/windows/wsl/about)).

> **Note:**  WSL is only available in Windows 10 version 1607 (the Anniversary update) or higher.



| Contents                                                     |
| :------------------------------------------------------------ |
| [<u>Step1:</u> Install the Windows Subsystem for Linux (WSL).](#step1-install-the-windows-subsystem-for-linux-wsl) |
| [<u>Step2:</u> Install Ubuntu distribution.](#step2-install-ubuntu-distribution) |
| [<u>Step3:</u> Install ROS distribution.](#step3-install-ros-distribution) |
| [<u>Step4:</u> Test your installation.](#step4-test-your-installation) |



Here a full guide how to install ROS on Windows 10 using [Windows Subsystem for Linux (WSL)](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F).

> **Note:**  WSL is only available in Windows 10 version 1607 (the Anniversary update) or higher.





# <u>Step1:</u> Install the Windows Subsystem for Linux (WSL).

## 1. Enabling WSL in Windows 10

Before installing any Linux distributions on Windows, you must enable the "Windows Subsystem for Linux" optional feature in one of the following two ways:

### 1.1.a	Using the GUI for enabling Windows features:

1. Open the Start Menu and search ***Turn Windows features on or off***

2. Select ***Windows Subsystem for Linux***

   | ![](https://i.imgur.com/a5PDpn8.png?4) |
   | :------------------------------------: |

   

3. Click ***OK***

> **Note:** To only install [WSL 1](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-1), you should now restart your machine and move on to [**Step2:** Install Ubuntu distribution.](#step2-install-ubuntu-distribution)



### 1.1.b	Using PowerShell:

1. Open [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```

> **Note:** To only install [WSL 1](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-1), you should now restart your machine and move on to [**Step2:** Install Ubuntu distribution.](#step2-install-ubuntu-distribution)



## 2. Update to WSL 2 `(Optional)`

[WSL 2](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is-the-Windows-Subsystem-for-Linux-(WSL)%3F#what-is-wsl-2) is a new version of the architecture in WSL that changes how Linux distributions interact with Windows. WSL 2 has the primary goals of increasing file system performance and adding full system call compatibility. Each Linux distribution can run as WSL 1 or as WSL 2, and can be switched between at any time. WSL 2 is a major overhaul of the underlying architecture and uses virtualization technology and a Linux kernel to enable its new features.



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





> | **Additional Installation Resources**:                       |
> | :----------------------------------------------------------- |
> | [WSL1 Installation Guide](https://docs.microsoft.com/en-us/windows/wsl/install-win10) from Microsoft |
> | [WSL2 Installation Guide](https://docs.microsoft.com/en-us/windows/wsl/wsl2-install) from Microsoft |
> | [Windows Server Installation Guide](https://docs.microsoft.com/en-us/windows/wsl/install-on-server) from Microsoft |







# <u>Step2:</u> Install Ubuntu distribution.

## 1. Installing Ubuntu on WSL

### 1.1.a	Installing Ubuntu on WSL via the Microsoft Store: `(Recommended)`

The following Ubuntu releases are available as apps on the Microsoft Store:

- [Ubuntu](https://www.microsoft.com/en-us/p/ubuntu/9nblggh4msv6) (*without the release version*) always follows the **recommended** release, switching over to the next one when it gets the first point release.
- [Ubuntu 20.04 LTS](https://www.microsoft.com/store/apps/9N6SVWS3RX71) (*Focal*) is the current LTS release, supporting both x64 and ARM64 architecture.
- [Ubuntu 18.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-1804/9n9tngvndl3q) (*Bionic*) is the second LTS release and the first one supporting ARM64 systems, too.
- [Ubuntu 16.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-1604/9pjn388hp8c9) (*Xenial*) is the first release available for WSL. It supports the x64 architecture only.

Each app creates a separate root file system in which Ubuntu shells are opened but app updates don’t change the root file system afterwards. Installing a different app in parallel creates a different root file system allowing you to have both Ubuntu LTS releases installed and running in case you need it for keeping compatibility with other external systems. You can also upgrade your Ubuntu 16.04 to 18.04 by running `do-release-upgrade` and have three different systems running in parallel, separating production and sandboxes for experiments.



### 1.1.b	Installing Ubuntu on WSL via rootfs:

Ubuntu WSL distribution rootfs daily builds are available for download:

- [Ubuntu 20.04 LTS](https://cloud-images.ubuntu.com/focal/current/) (*Focal*)
- [Ubuntu 19.10](https://cloud-images.ubuntu.com/eoan/current/) (*Eoan*)
- [Ubuntu 18.04 LTS](https://cloud-images.ubuntu.com/bionic/current/) (*Bionic*)

- [Ubuntu 16.04 LTS](https://cloud-images.ubuntu.com/xenial/current/) (*Xenial*)

They can be installed using the [wsl](https://docs.microsoft.com/en-us/windows/wsl/reference) command:

```bash
wsl --import <DistributionName> <InstallLocation> <FileName>
```



### 1.1.c	Installing Ubuntu on WSL by sideloading the `.appx`:

Ubuntu WSL distribution .appx builds are available for download:

- [Ubuntu 20.04 LTS](https://aka.ms/wslubuntu2004) (*Focal*)
- [Ubuntu 20.04 LTS arm64](https://aka.ms/wslubuntu2004arm)
- [Ubuntu 18.04 LTS](https://aka.ms/wsl-ubuntu-1804) (*Bionic*)
- [Ubuntu 18.04 LTS arm64](https://aka.ms/wsl-ubuntu-1804-arm)
- [Ubuntu 16.04 LTS](https://aka.ms/wsl-ubuntu-1604) (*Xenial*)

They can be installed by enabling sideloading in Windows 10 and double-clicking the .appx and clicking Install or with [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6):

```powershell
Add-AppxPackage .\Ubuntu_2004.2020.424.0_x64.appx
```





## 2. Set up a new Ubuntu distribution on WSL

### 2.1	Starting Ubuntu on WSL:

The Ubuntu on WSL terminal can be started via:

- The app tile in the Windows Start menu (or pinned to your taskbar)
- [WSL - Remote extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-wsl) for [Visual Studio Code](https://code.visualstudio.com/).
- The [wsl](https://docs.microsoft.com/en-us/windows/wsl/reference) command on the Windows command prompt or [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6)
- By running `ubuntu2004.exe`, etc. on the Windows command prompt or [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6)



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

Windows does not automatically update or upgrade your Linux distribution(s). This is a task that the most Linux users prefer to control themselves.



# <u>Step3:</u> Install ROS distribution.

## 1. Choose a ROS distribution

There is more than one ROS distribution supported at a time. Some are older releases with long term support, making them more stable, while others are newer with shorter support life times, but with binaries for more recent platforms and more recent versions of the ROS packages that make them up. See the [Distributions](https://github.com/MohanadSinan/Smart-Methods/wiki/What-is--Robot-Operating-System-(ROS)%3F) page for more details.

We recommend one of the versions below:

| [ROS Kinetic Kame](http://wiki.ros.org/kinetic/Installation) | [ROS Melodic Morenia](http://wiki.ros.org/melodic/Installation) | [ROS Noetic Ninjemys](http://wiki.ros.org/noetic/Installation) |
| :----------------------------------------------------------: | :----------------------------------------------------------: | :----------------------------------------------------------: |
|                    **Released May, 2016**                    |                    **Released May, 2018**                    |                    **Released May, 2020**                    |
|              *LTS, supported until April, 2021*              |               *LTS, supported until May, 2023*               |        ***Latest LTS*** *,supported until May, 2025*         |
|             `Isn't recommended for new installs`             |                `Recommended for Ubuntu 18.04`                |                `Recommended for Ubuntu 20.04`                |
| <img src="https://raw.githubusercontent.com/ros-infrastructure/artwork/master/distributions/kinetic.png" alt="Kinetic Kame" width="200" height="200"/> | <img src="https://raw.githubusercontent.com/ros-infrastructure/artwork/master/distributions/melodic_with_bg.png" alt="Melodic Morenia" width="200" height="200"/> | <img src="https://raw.githubusercontent.com/ros-infrastructure/artwork/master/distributions/noetic.png" alt="Noetic Ninjemys" height="200"/> |



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

Now pick how much of ROS you would like to install.

- **Desktop-Full Install: `(Recommended)`** : Everything in **Desktop** plus 2D/3D simulators and 2D/3D perception packages

  ```bash
  sudo apt install ros-noetic-desktop-full
  ```

- **Desktop Install:** Everything in **ROS-Base** plus tools like [rqt](http://wiki.ros.org/rqt) and [rviz](http://wiki.ros.org/rviz)

  ```bash
  sudo apt install ros-noetic-desktop
  ```

- **ROS-Base: (Bare Bones)** ROS packaging, build, and communication libraries. No GUI tools.

  ```bash
  sudo apt install ros-noetic-ros-base
  ```

> There are even more packages available in ROS. You can always install a specific package directly.
>
> ```bash
> sudo apt install ros-noetic-PACKAGE
> ```
>
> e.g.
>
> ```bash
> sudo apt install ros-noetic-slam-gmapping
> ```

> To find available packages, see [ROS Index](https://index.ros.org/packages/page/1/time/#noetic) or use:
>
> ```bash
> apt search ros-noetic
> ```





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

**zsh**

```bash
echo "source /opt/ros/noetic/setup.zsh" >> ~/.zshrc
source ~/.zshrc
```



# <u>Step4:</u> Test your installation.

Now, to test your installation, A good way to check is to ensure that [environment variables](http://wiki.ros.org/ROS/EnvironmentVariables) like [ROS_ROOT](http://wiki.ros.org/ROS/EnvironmentVariables#ROS_ROOT) and [ROS_PACKAGE_PATH](http://wiki.ros.org/ROS/EnvironmentVariables#ROS_PACKAGE_PATH) are set:

```bash
printenv | grep ROS
```

If they are not then you might need to 'source' some setup.
