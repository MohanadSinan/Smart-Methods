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

#### Using the GUI for enabling Windows features:

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
1. Open [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/overview?view=powershell-6) as Administrator and run:

```powershell
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
```

2. Restart your computer when prompted





#### Updating the WSL 2 Linux kernel:

#### Set WSL 2 as your default version:



## <u>Step2:</u> Install Ubuntu distribution.

## <u>Step3:</u> Install ROS distribution.

## <u>Step4:</u> Test your installation.
