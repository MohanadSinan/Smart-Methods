# Control DC motors using Arduino

A DC, motor is the most common type of motor. DC motors normally have just two leads, one positive and one negative. If you connect these two leads directly to a battery, the motor will rotate. If you switch the leads, the motor will rotate in the opposite direction.

To control the direction of the spin of DC motor, without changing the way that the leads are connected, you can use a circuit called an H-Bridge. An H bridge is an electronic circuit that can drive the motor in both directions. H-bridges are used in many different applications, one of the most common being to control motors in robots. It is called an H-bridge because it uses four transistors connected in such a way that the schematic diagram looks like an "H".

You can use discrete transistors to make this circuit, but for this tutorial, we will be using the L298N H-Bridge driver module. The L298N module can control the speed and direction of DC motors and stepper motors and can control two motors simultaneously. Its current rating is 2A for each motor. At these currents, however, you will need to use heat sinks. 



### Tow DC motors using Arduino + L298N H-Bridge driver:

This  project made by [fritzing](https://fritzing.org/) in `.fzz` file format. You can view the project from here. 

| component                       |
| :------------------------------ |
| 1X Arduino Board                |
| 2X DC Motors                    |
| 1X L298N H-Bridge driver module |
| 1X Power Supply (6-12v)         |
| 12X Jump Wires                  |



| ![Circuit Connection](./2DCmotor.svg) |
| :----------------------------------------------------------: |
| Tow DC motors using Arduino + L298N H-Bridge driver - Circuit Connection |



| ![schematic](./2DCmotor_schem.svg) |
| :----------------------------------------------------------: |
| Tow DC motors using Arduino + L298N H-Bridge driver - schematic |



