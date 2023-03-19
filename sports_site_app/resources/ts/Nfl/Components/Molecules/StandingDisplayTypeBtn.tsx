import ToggleButton from 'react-bootstrap/ToggleButton';
import ToggleButtonGroup from 'react-bootstrap/ToggleButtonGroup';

function StandingDisplayTypeBtn() {
  return (
    <>
      <div style={{width: '80%', margin: '40px auto 0'}}>
        <ToggleButtonGroup type="radio" name="options" defaultValue={3}>
          <ToggleButton id="tbg-radio-1" value={1} variant="outline-primary">
            リーグ
          </ToggleButton>
          <ToggleButton id="tbg-radio-2" value={2} variant="outline-primary">
            カンファレンス
          </ToggleButton>
          <ToggleButton id="tbg-radio-3" value={3} variant="outline-primary">
            ディビジョン
          </ToggleButton>
        </ToggleButtonGroup>
      </div>
    </>
  );
}

export default StandingDisplayTypeBtn;

// const handleChange = (newValue) => {
//   setValue(newValue);
// };


