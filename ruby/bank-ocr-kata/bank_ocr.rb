class Number
  attr_reader :pipe_underscore_number_array
  def initialize(pipe_underscore_number_array)
    @pipe_underscore_number_array = pipe_underscore_number_array
  end

  def to_s
    {
      10 => '0',
      4 => '1',
      7 => '2',
    }.fetch(group_total)
  end

  private

  def group_total
    @pipe_underscore_number_array.reduce(0) do |group_total, row|
      group_total += row.reduce(0) do |row_total, character|
        case character
        when "_"
          row_total += 1
        when "|"
          row_total += 2
        else
          row_total += 0
        end
        row_total
      end
      group_total
    end
  end
end

class Account

  attr_reader :array_representation
  def initialize(array_representation)
    @array_representation = array_representation
  end

  def to_s
    r = array_representation
          .map { |row| row.each_slice(3).to_a }
          .transpose
          .map do |row_array|
              Number.new(row_array).to_s
          end
    r.join("")
  end
end


class Accounts
  def self.from_string(account_numbers_string)
    rows = account_numbers_string
             .split("\n")
             .map { |str| str.split("") }

    self.new(rows)
  end

  attr_reader :account_numbers
  def initialize(account_numbers)
    @account_numbers = account_numbers
  end

  def to_a
    [Account.new(@account_numbers).to_s]
  end
end