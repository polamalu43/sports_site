import { Table } from 'react-bootstrap';
import { generateUniqueKey } from '../../../utils/Common';

interface Props<T> {
  datas: T[];
  conferenceName: string | null;
  divisionName: string | null;
}

const StandingDataTable = <T extends object>({ datas, conferenceName, divisionName }: Props<T>): JSX.Element => {
  const keys: string[] | number[] = Object.keys(datas[0]);

  return (
    <div className='basic_table_for_team_data'>
      { conferenceName ? <div className='standing_conference_name'>{conferenceName}</div> : '' }
      { divisionName ? <div className='standing_division_name'>{divisionName}</div> : '' }
      <div  className={ !divisionName ? 'margin_t40px' : ''}>
        <Table striped bordered hover>
          <thead>
            <tr>
              {
                keys.map(( key ) => (
                  <th
                    key={ generateUniqueKey() }
                  >
                    { key }
                  </th>
                ))
              }
            </tr>
          </thead>
          <tbody>
            {
              datas.map(( data ) => (
                <tr key={ generateUniqueKey() }>
                  {
                    Object.values(data).map(( value, index ) => (
                      <td
                        key={ generateUniqueKey() }
                        className={index >= 1 ? "text_align_right" : ""}
                      >
                        {index === 0 ? <a href='/'>{value}</a> : value}
                      </td>
                    ))
                  }
                </tr>
              ))
            }
          </tbody>
        </Table>
      </div>
    </div>
  );
}

export default StandingDataTable;
