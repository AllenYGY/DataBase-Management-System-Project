# Simplify Database

## User 拆表

- customer
- cadmin
- admin

- user 拆分作为优化

## History

- Delivery
- pendin g
- In_transit
- accept

## Delivery process

user $send$  courier station A   $send\ off$       courier station B $pick$  userB

```php
            if (isset($inTransitData)) {
              foreach ($inTransitData as $inTransitDataRow) {
                $send_time = isset($inTransitDataRow['send_time']) ? date('Y-m-d', strtotime($inTransitDataRow['send_time'])) : 'unknown';
                $pick_time = isset($inTransitDataRow['pick_time']) ? date('Y-m-d', strtotime($inTransitDataRow['pick_time'])) : 'unknown';
                $send_storage_time = isset($inTransitDataRow['send_storage_time']) ? date('Y-m-d', strtotime($inTransitDataRow['send_storage_time'])) : 'unknown';
                $pick_storage_time = isset($inTransitDataRow['pick_storage_time']) ? date('Y-m-d', strtotime($inTransitDataRow['pick_storage_time'])) : 'unknown';
                $dayOfWeek = isset($send_time) ? date('l', strtotime($send_time)) : 'unknown';
                $date = isset($inTransitDataRow['send_storage_time']) ? date('d', strtotime($inTransitDataRow['send_storage_time'])) : 'unknown';
                $pID = isset($inTransitDataRow['parcelID']) ? $inTransitDataRow['parcelID'] : 'unknown';
                $startadr = isset($inTransitDataRow['location']) ? $inTransitDataRow['location'] : 'unknown';
                $pstatus = isset($inTransitDataRow['status']) ? $inTransitDataRow['status'] : 'unknown';
                $endadr = isset($inTransitDataRow['send_address']) ? $inTransitDataRow['send_address'] : 'unknown';

                switch ($dayOfWeek) {
                  case 'Monday':
                    $cssClass = 'activity-one';
                    $day = 'MON';
                    break;
                  case 'Tuesday':
                    $cssClass = 'activity-two';
                    $day = 'TUE';
                    break;
                  case 'Wednesday':
                    $cssClass = 'activity-three';
                    $day = 'WED';
                    break;
                  case 'Thursday':
                    $cssClass = 'activity-four';
                    $day = 'THU';
                    break;
                  case 'Friday':
                    $cssClass = 'activity-five';
                    $day = 'FRI';
                    break;
                  case 'Saturday':
                    $cssClass = 'activity-six';
                    $day = 'SAT';
                    break;
                  default:
                    $cssClass = 'activity-seven';
                    $day = 'SUN';
                    break;
                }
                echo "
                  <div class='day-and-activity $cssClass'>
                      <div class='day'>
                          <h1>$date</h1>
                          <p>$day</p>
                      </div>
                      <div class='activity'>
                          <h2>Package ID: $pID</h2>
                          <h2>Package Status: $pstatus</h2>
                          <h3>&nbsp;&nbsp;Send time: $send_time</h3>
                          <h3>&nbsp;&nbsp;Send storage time: $send_storage_time</h3>
                          <h3>&nbsp;&nbsp;Pick storage time: $pick_storage_time</h3>
                          <h3>&nbsp;&nbsp;Pick time: $pick_time</h3>
                          <h3>&nbsp;&nbsp;Package send courier Station: $startadr</h3>
                          <h3>&nbsp;&nbsp;Package pick courier Station: $endadr</h3>
                      </div>
                  </div>
              ";
              }
            } else {
              echo "              
                <div class='day-and-activity activity-four'>
                    <div class='day'>
                      <h1>$date</h1>
                      <p>$day</p>
                    </div>
                    <div class='activity'>
                      <h2>No current Packages history</h2>
                    </div>
                </div>
              ";
            }
```
