# Legacy Checkmk Plugins

A collection of custom checks, agents, and extension packages originally built for Check_MK 1.2-era monitoring environments.

> **Compatibility warning:** most checks use the legacy Checkmk Python API (`check_info`, `inventory_function`, and `factory_settings`) and the packaged extensions declare Check_MK `1.2.0p2`. They are not drop-in compatible with current Checkmk releases. Treat this repository as legacy source material and port each check to the current Check API before production use.

## Included integrations

| Directory | Purpose |
| --- | --- |
| `fa/` | Fibre Alliance device checks |
| `fc/` | Fibre Channel port monitoring |
| `nginx/` | Nginx agent plugin and checks, including certificate handling |
| `osx/` | Legacy macOS agent, launchd configuration, plugins, and installer files |
| `sony/` | Sony VPL projector lamp and error checks |
| `vtrak/` | Promise VTrak enclosure, disk, battery, fan, power, temperature, and voltage checks |
| `windows_mount/` | PowerShell monitoring for mapped Windows drives |
| `xsan/` | Apple Xsan agents and filesystem, path, and performance checks |

Prebuilt `.mkp` archives are included for several integrations. Their package metadata and contents date from the original Check_MK 1.2 implementation.

## Using the source

1. Identify the integration and check files needed for your environment.
2. Review every agent-side script before deployment; several call platform- or vendor-specific commands.
3. Test against the exact legacy Check_MK version for which the code was written, or port the check to the API used by your supported Checkmk release.
4. Build a new extension package with the tooling from that Checkmk release instead of assuming the bundled `.mkp` files are compatible.

For the legacy macOS agent notes, see [`osx/README.txt`](osx/README.txt).

## Porting guidance

When modernizing a check, separate the work into an agent or special-agent data source, a parser, discovery, and check functions. Preserve sample agent output as test fixtures before changing parsing behavior. Vendor hardware and command output vary by firmware, so validate discovery and thresholds on representative devices.

## Project status

This repository is maintained as a historical collection, with a small Nginx update in 2023. Open an issue or pull request with the Checkmk version, edition, sample agent output with secrets removed, and the affected device or platform when proposing a fix.

## License

No repository-wide license file is currently provided. Confirm the applicable terms before redistributing or incorporating this code into another project.
