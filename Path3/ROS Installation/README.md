# Install ROS on windows 10 using WSL *(without VM)*

Here I'll explain step-by-step how to install ROS on Windows 10 using Windows Subsystem for Linux ([WSL](https://docs.microsoft.com/en-us/windows/wsl/about)).

> **Note:**  WSL is only available in Windows 10 version 1607 (the Anniversary update) or higher.



| Contents                                                     |
| :------------------------------------------------------------ |
| [<u>Step1:</u> Install the Windows Subsystem for Linux (WSL).](#step1-install-the-windows-subsystem-for-linux-wsl) |
| [<u>Step2:</u> Install Ubuntu distribution.](#step2-install-ubuntu-distribution) |
| [<u>Step3:</u> Install ROS distribution.](#step3-install-ros-distribution) |
| [<u>Step4:</u> Test your installation.](#step4-test-your-installation) |





## <u>Step1:</u> Install the Windows Subsystem for Linux (WSL).

### 1. Enabling WSL in Windows 10

Before installing any Linux distributions on Windows, you must enable the "Windows Subsystem for Linux" optional feature in one of the following two ways:

#### **Using the GUI for enabling Windows features:**

1. Open the Start Menu and search ***Turn Windows features on or off***

2. Select ***Windows Subsystem for Linux***

   | ![](https://i.imgur.com/a5PDpn8.png?4) |
   | :------------------------------------: |

   

3. Click ***OK***

4. **Restart** your computer when prompted



#### Using PowerShell:

1. Open [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```

2. Restart your computer when prompted





### 2. Update to WSL 2 *(Recommend)*

WSL 2 is a new version of the architecture in WSL that changes how Linux distributions interact with Windows. WSL 2 has the primary goals of increasing file system performance and adding full system call compatibility. Each Linux distribution can run as WSL 1 or as WSL 2, and can be switched between at any time. WSL 2 is a major overhaul of the underlying architecture and uses virtualization technology and a Linux kernel to enable its new features.



> **Note:** WSL 2 is only available in Windows 10, updated to version 2004, **Build 19041** or higher.



#### Enable the 'Virtual Machine Platform' optional component:
1. Open PowerShell as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
```

2. Restart your computer when prompted



#### Updating the WSL 2 Linux kernel:

Download the [Linux kernel update package](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi) for x64 machines.

> **Note:** If you're using an ARM64 machine, please download the [ARM64 package](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_arm64.msi) instead.



#### Set WSL 2 as your default version:

Run the following command in PowerShell to set WSL 2 as the default version when installing a new Linux distribution:

```powershell
wsl --set-default-version 2
```







## <u>Step2:</u> Install Ubuntu distribution.

### Installing Ubuntu on WSL via the Microsoft Store:

The following Ubuntu releases are available as apps on the Microsoft Store:

- [Ubuntu](https://www.microsoft.com/en-us/p/ubuntu/9nblggh4msv6) (without the release version) always follows the **recommended** release, switching over to the next one when it gets the first point release.
- [Ubuntu 20.04 LTS](https://www.microsoft.com/store/apps/9N6SVWS3RX71) (Focal) is the current LTS release, supporting both x64 and ARM64 architecture.
- [Ubuntu 18.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-1804/9n9tngvndl3q) (Bionic) is the second LTS release and the first one supporting ARM64 systems, too.
- [Ubuntu 16.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-1604/9pjn388hp8c9) (Xenial) is the first release available for WSL. It supports the x64 architecture only.



### Running Ubuntu on WSL:

The Ubuntu on WSL terminal can be started via:

- The app tile in the Windows Start menu (or pinned to your taskbar)
- [WSL - Remote extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-wsl) for [Visual Studio Code](https://code.visualstudio.com/).
- The [wsl](https://docs.microsoft.com/en-us/windows/wsl/reference) command on the Windows command prompt or [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6)
- By running `ubuntu1804.exe`, etc. on the Windows command prompt or [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6)



## <u>Step3:</u> Install ROS distribution.

## <u>Step4:</u> Test your installation.
