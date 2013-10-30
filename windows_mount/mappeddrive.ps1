param(
	[Parameter(Position=0,Mandatory=$true)]
	[string]$DriveLetter,
	[Parameter(Position=1,Mandatory=$true)]
	[string]$Path
)

#echo `<`<`<local`>`>`>

$item1 = [System.IO.DriveInfo]::getdrives() | Where-Object {$_.Name -Match $DriveLetter}

if ($item1.IsReady){
  if ($item1.VolumeLabel -eq $Path){
    $status1 = 0
    $statustxt1 = "OK"
    $descriptiontxt1 = "Mapped to $($item1.VolumeLabel); $($item1.IsReady)"
  }
  else {
    $status1 = 1
    $statustxt1 = "WARNING"
    $descriptiontxt1 = "Mapped to $($item1.VolumeLabel); $($item1.IsReady)"
  }
}
else {
  $status1 = 3
  $statustxt1 = "CRITICAL"
  $descriptiontxt1 = "$Path $($item1.VolumeLabel)! $($item1.IsReady)!"
}

Echo "$status1 Mappeddrive_1_$DriveLetter - $statustxt1 - $descriptiontxt1"

$item2 = Get-WmiObject win32_logicaldisk | Where-Object {$_.DeviceID -Match $DriveLetter}

if ($item2){
  if ($item2.VolumeName -eq $Path){
    $status2 = 0
    $statustxt2 = "OK"
    $descriptiontxt2 = "Mapped to $($item2.VolumeName); $($item2.ProviderName)"
  }
  else {
    $status2 = 1
    $statustxt2 = "WARNING"
    $descriptiontxt2 = "Mapped to $($item2.VolumeName); $($item2.ProviderName)"
  }
}
else {
  $status2 = 3
  $statustxt2 = "CRITICAL"
  $descriptiontxt2 = "$Path Not Connected $($item2.VolumeName)! $($item2.ProviderName)!"
}

Echo "$status2 Mappeddrive_2_$DriveLetter - $statustxt2 - $descriptiontxt2"
