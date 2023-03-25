import React from 'react';
import ToggleButton from 'react-bootstrap/ToggleButton';
import ToggleButtonGroup from 'react-bootstrap/ToggleButtonGroup';

type Props = {
  displayType: number,
  setDisplayType: React.Dispatch<React.SetStateAction<number>>;
};

const StandingDisplayTypeBtn: React.FC<Props> = ({ displayType, setDisplayType }) =>  {
  const displayTypeHandler = (type: number): void => {
    setDisplayType(type);
  }

  return (
    <>
      <div style={{width: '80%', margin: '40px auto 0'}}>
        <ToggleButtonGroup type="radio" name="options" defaultValue={displayType + 1}>
          <ToggleButton id="tbg-radio-1" value={1} variant="outline-primary" onClick={() => displayTypeHandler(0)}>
            リーグ
          </ToggleButton>
          <ToggleButton style={{borderLeft: 'none'}} id="tbg-radio-2" value={2} variant="outline-primary" onClick={() => displayTypeHandler(1)}>
            カンファレンス
          </ToggleButton>
          <ToggleButton style={{borderLeft: 'none'}} id="tbg-radio-3" value={3} variant="outline-primary" onClick={() => displayTypeHandler(2)}>
            ディビジョン
          </ToggleButton>
        </ToggleButtonGroup>
      </div>
    </>
  );
}

export default StandingDisplayTypeBtn;


