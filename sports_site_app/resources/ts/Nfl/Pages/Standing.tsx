import React, { useEffect, useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import StandingDataTable from '../Components/Molecules/StandingDataTable';
import StandingDisplayTypeBtn from '../Components/Molecules/StandingDisplayTypeBtn';
import NflHeader from '../Components/Organisms/NflHeader';
import NflFooter from '../Components/Organisms/NfFooter';
import axios from 'axios';
import { Standings, Team, FilterData } from '../Types/Standings';
import { generateUniqueKey } from '../../utils/Common';

const Standing: React.FC = () => {
  const [standings, setStandings] = useState<Standings | null>(null);
  const [displayType, setDisplayType] = useState<number>(2);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.post('/api/nfl/standings');
        setStandings(response.data);
      } catch (error) {
        console.error(error);
      }
    };
    fetchData();
  }, []);

  //テーブルに表示する項目
  const select_data: Array<keyof Team> = [
    'name',
    'wins',
    'losses',
    'ties',
    'percentage',
    'points_for',
    'points_against',
    'net_points',
    'touchdowns',
  ];

  //テーブルに表示する項目を選定する関数
  function filterData(data: Team[]): FilterData[] {
    return data.map(obj => {
      const filteredObj: FilterData = {};
      select_data.forEach(key => {
        if (key in obj) {
          filteredObj[key] = obj[key];
        }
      });
      return filteredObj;
    });
  }

  //テーブルに表示するリーグデータ
  const displayLeagueData: FilterData[] | null = standings
    ? filterData(standings.league['2022'][1] as unknown as Team[])
    : null;

  //テーブルに表示するカンファレンスデータ
  let conferenceData: Record<string, FilterData[]> = {};
  if (standings) {
    Object.entries(standings.conference['2022'][1]).forEach(([conference, team]) => {
      conferenceData[conference] = filterData(team as Team[]);
    });
  }

  const displayConferenceData: Record<string, FilterData[]> | null = conferenceData
    ? conferenceData
    : null;

  //テーブルに表示するディビジョンデータ
  let divisionData: Record<string, Record<string, FilterData[]>> = {};
  if (standings) {
    Object.entries(standings.division['2022'][1]).forEach(([conferenceName, divisions]) => {
      Object.entries(divisions).forEach(([divisionName, team]) => {
        divisionData[conferenceName] = divisionData[conferenceName] || {};
        divisionData[conferenceName][divisionName] = filterData(team as Team[]);
      });
    });
  }

  const displayDivisionData: Record<string, Record<string, FilterData[]>> | null = divisionData
  ? divisionData
  : null;

  //リーグ, カンファレンス, ディビジョンデータ表示用のコンポーネント
  const LeagueComponent = () => {
    return (
      <>
        { displayLeagueData
            ? <StandingDataTable<FilterData> datas={ displayLeagueData } subtitle={null}/>
            : ''
        }
      </>
    )
  }

  const ConferenceComponent = () => {
    return (
      <>
        { displayConferenceData
            ? Object.entries(displayConferenceData).map(([key, teams]) => {
              return (
                <React.Fragment key={generateUniqueKey()}>
                  <StandingDataTable<FilterData> datas={ teams } subtitle={key}/>
                </React.Fragment>
              )
            })
            : ''
        }
      </>
    )
  }

  const DivisionComponent = () => {
    return (
      <>
        { displayDivisionData
            ? Object.entries(displayDivisionData).map(([conferenceName, divisions]) => {
              return Object.entries(divisions).map(([divisionName, teams]) => {
                return (
                  <React.Fragment key={generateUniqueKey()}>
                    <StandingDataTable<FilterData> datas={ teams } subtitle={divisionName}/>
                  </React.Fragment>
                )
              })
            })
            : ''
        }
      </>
    )
  }

  //JSX
  return (
    <>
      <NflHeader />
        <StandingDisplayTypeBtn displayType={displayType} setDisplayType={ setDisplayType }/>
        { displayType === 0 ? <LeagueComponent /> : ''}
        { displayType === 1 ? <ConferenceComponent /> : ''}
        { displayType === 2 ? <DivisionComponent /> : ''}
      {/* <NflFooter /> */}
    </>
  )
}

export default Standing;
