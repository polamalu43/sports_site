import React, { useEffect, useState, useReducer } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import StandingDataTable from '../Components/Molecules/StandingDataTable';
import StandingDisplayTypeBtn from '../Components/Molecules/StandingDisplayTypeBtn';
import NflHeader from '../Components/Organisms/NflHeader';
import NflFooter from '../Components/Organisms/NfFooter';
import axios from 'axios';
import { Standings, Team, FilterData } from '../Types/Standings';

const Standing: React.FC = () => {
  const [standings, setStandings] = useState<Standings | null>(null);
  const [displayType, setDisplayType] = useState<Number>(0);

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

  const displayDivisionData: FilterData[] | null = standings
    ? filterData(standings.league['2022'][1] as unknown as Team[])
    : null;

  const displayLeagueData: FilterData[] | null = standings ? filterData(standings.league['2022'][1] as unknown as Team[]) : null;

  // const reducer = (state, action) => {
  //   switch (action.type) {
  //     case 0:
  //       return 'LeagueComponent';
  //     case 0:
  //       return 'LeagueComponent';
  //     case 0:
  //       return 'LeagueComponent';
  //     default:
  //       throw new Error();
  //   }
  // }

  const LeagueComponent = () => {
    return (
      <>
        { displayLeagueData
            ? <StandingDataTable<FilterData> datas={ displayLeagueData } />
            : <div>...Loading</div>
        }
      </>
    )
  }

  // const [state, dispatch] = useReducer(reducer, 'component1');

  return (
    <>
      <NflHeader />
        <StandingDisplayTypeBtn />
        { displayLeagueData
          ? <StandingDataTable<FilterData> datas={ displayLeagueData } />
          : <div>...Loading</div>
        }
      <NflFooter />
    </>
  )
}

export default Standing;
